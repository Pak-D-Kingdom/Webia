# Panduan Auto-Provisioning Hosting WEBIA

Dokumen ini menjelaskan alur kerja, arsitektur, dan langkah konfigurasi untuk modul auto-provisioning hosting pelanggan WEBIA menggunakan OpenSSH runner (`HostingDeployer`).

---

## 1. Arsitektur Alur Kerja

```
[Pesanan Selesai / Disetujui]
              │
              ▼
[HostingProvisioner] ──> Membuat HostingService (status: pending_activation)
                     ──> Membuat HostingTask (type: deploy_website, status: pending)
              │
              ▼
[Admin Panel: /admin/hosting-tasks] ──> Admin klik "Konfirmasi Tindakan"
              │
              ▼
[HostingDeployer] ──(OpenSSH / BatchMode=yes)──> [Server VPS Hosting Target]
                                                        │
                                                        ▼
                                          [deploy-site.sh via STDIN JSON]
                                          • Validasi Domain
                                          • Buat VHost Nginx
                                          • Setup Web Root & SSL
                                          • Reload Nginx
              │
              ▼
• Jika Sukses (Exit 0): Task -> completed, HostingService -> operational_status: active
• Jika Gagal (Non-zero): Task tetap pending, HostingService tetap pending_activation
```

---

## 2. Format Payload STDIN

Aplikasi WEBIA mengirimkan JSON berikut ke STDIN skrip deploy remote:

```json
{
  "domain": "klinik-sehat.sites.webia.id",
  "order_number": "WEB-261105-PRUP",
  "site_config_path": "config/template/healthcare/klinik-sehat.php"
}
```

---

## 3. Konfigurasi Environment (`.env`)

Pada server aplikasi WEBIA, konfigurasikan variabel berikut:

```env
# Domain dasar untuk subdomain konsumen
HOSTING_SITE_DOMAIN=sites.webia.id

# Konfigurasi SSH Runner
HOSTING_SSH_BINARY=ssh
HOSTING_SSH_HOST=203.0.113.10
HOSTING_SSH_PORT=22
HOSTING_SSH_USER=deployer
HOSTING_SSH_PRIVATE_KEY=/var/www/webia/.ssh/id_ed25519
HOSTING_SSH_KNOWN_HOSTS=/var/www/webia/.ssh/known_hosts
HOSTING_DEPLOY_COMMAND=/opt/webia/bin/deploy-site.sh
HOSTING_DEPLOY_TIMEOUT=120
```

> **Keamanan Kunci SSH:**
> - File `HOSTING_SSH_PRIVATE_KEY` harus memiliki izin akses `600` (`chmod 600 id_ed25519`).
> - Gunakan kunci SSH khusus (misal: ed25519) tanpa passphrase yang hanya diizinkan untuk eksekusi skrip deploy.
> - `HOSTING_SSH_KNOWN_HOSTS` wajib diisi untuk mencegah serangan Man-in-the-Middle (`StrictHostKeyChecking=yes`).

---

## 4. Persiapan di Server VPS Target

### A. Buat User Deployer
```bash
sudo useradd -m -s /bin/bash deployer
sudo mkdir -p /home/deployer/.ssh
sudo chmod 700 /home/deployer/.ssh
# Masukkan public key WEBIA ke authorized_keys:
sudo nano /home/deployer/.ssh/authorized_keys
sudo chmod 600 /home/deployer/.ssh/authorized_keys
sudo chown -R deployer:deployer /home/deployer/.ssh
```

### B. Konfigurasi Sudoers Terbatas (Tanpa Password)
Beri izin user `deployer` hanya untuk perintah yang diperlukan (buat vhost dan reload nginx):

```bash
sudo visudo -f /etc/sudoers.d/webia-deployer
```
Isi file:
```
deployer ALL=(ALL) NOPASSWD: /usr/bin/mv /tmp/*.conf /etc/nginx/sites-available/, /usr/bin/ln -sf /etc/nginx/sites-available/* /etc/nginx/sites-enabled/, /usr/bin/rm -f /etc/nginx/sites-enabled/*, /usr/sbin/nginx -t, /bin/systemctl reload nginx
```

### C. Pasang Skrip Deploy
1. Salin template `scripts/hosting/deploy-site.sh.example` ke server VPS target di `/opt/webia/bin/deploy-site.sh`.
2. Berikan izin eksekusi:
   ```bash
   sudo chmod +x /opt/webia/bin/deploy-site.sh
   sudo chown deployer:deployer /opt/webia/bin/deploy-site.sh
   ```
3. Pastikan `jq` telah terinstall:
   ```bash
   sudo apt update && sudo apt install jq -y
   ```

---

## 5. Pengujian Manual dari Terminal

Anda dapat menguji skrip langsung di VPS target dengan perintah:

```bash
echo '{"domain":"test.sites.webia.id","order_number":"TEST-01"}' | /opt/webia/bin/deploy-site.sh
```

Jika berhasil, direktori `/var/www/customers/test.sites.webia.id` akan dibuat dan Nginx akan me-reload konfigurasi vhost baru.
