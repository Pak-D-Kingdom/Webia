
document.addEventListener("DOMContentLoaded", function () {
    // Ganti dengan nomor WhatsApp resmi klinik.
    const WHATSAPP_NUMBER = "6281234567890";

    // Mobile navigation
    const menuToggle = document.getElementById("menuToggle");
    const mainNav = document.getElementById("mainNav");

    if (menuToggle && mainNav) {
        menuToggle.addEventListener("click", function () {
            const isOpen = mainNav.classList.toggle("is-open");
            menuToggle.setAttribute("aria-expanded", String(isOpen));
            menuToggle.setAttribute(
                "aria-label",
                isOpen ? "Tutup navigasi" : "Buka navigasi"
            );
        });

        mainNav.querySelectorAll("a").forEach(function (link) {
            link.addEventListener("click", function () {
                mainNav.classList.remove("is-open");
                menuToggle.setAttribute("aria-expanded", "false");
                menuToggle.setAttribute("aria-label", "Buka navigasi");
            });
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                mainNav.classList.remove("is-open");
                menuToggle.setAttribute("aria-expanded", "false");
            }
        });
    }

    // Current year
    const currentYear = document.getElementById("currentYear");

    if (currentYear) {
        currentYear.textContent = new Date().getFullYear();
    }

    // Prevent selection of past appointment dates
    const appointmentDate = document.getElementById("appointmentDate");

    if (appointmentDate) {
        const now = new Date();
        const localToday = [
            now.getFullYear(),
            String(now.getMonth() + 1).padStart(2, "0"),
            String(now.getDate()).padStart(2, "0")
        ].join("-");

        appointmentDate.min = localToday;
    }

    // Treatment selection from treatment/package cards
    const treatmentSelect = document.getElementById("treatmentSelect");

    document.querySelectorAll("[data-treatment]").forEach(function (link) {
        link.addEventListener("click", function () {
            const selectedTreatment = link.dataset.treatment;

            if (!treatmentSelect || !selectedTreatment) {
                return;
            }

            const matchingOption = Array.from(
                treatmentSelect.options
            ).find(function (option) {
                return option.value === selectedTreatment ||
                    option.textContent.trim() === selectedTreatment;
            });

            if (matchingOption) {
                treatmentSelect.value = matchingOption.value;
            }
        });
    });

    // WhatsApp booking form
    const bookingForm = document.getElementById("bookingForm");

    if (bookingForm) {
        bookingForm.addEventListener("submit", function (event) {
            event.preventDefault();

            if (!bookingForm.reportValidity()) {
                return;
            }

            if (!/^\d{9,15}$/.test(WHATSAPP_NUMBER)) {
                alert("Nomor WhatsApp klinik belum dikonfigurasi dengan benar.");
                return;
            }

            const name = document.getElementById("customerName").value.trim();
            const phone = document.getElementById("customerPhone").value.trim();
            const treatment = treatmentSelect.value;
            const date = appointmentDate.value;
            const message = document.getElementById("customerMessage")
                .value.trim();

            const formattedDate = new Date(date + "T00:00:00")
                .toLocaleDateString("id-ID", {
                    day: "numeric",
                    month: "long",
                    year: "numeric"
                });

            const whatsappMessage = [
                "Halo AURA Skin Lab, saya ingin bertanya mengenai reservasi treatment.",
                "",
                "Nama: " + name,
                "Nomor WhatsApp: " + phone,
                "Treatment: " + treatment,
                "Tanggal yang diinginkan: " + formattedDate,
                "Catatan: " + (message || "-"),
                "",
                "Mohon informasi ketersediaan jadwal dan konfirmasi reservasi. Terima kasih."
            ].join("\n");

            const whatsappURL =
                "https://wa.me/" + WHATSAPP_NUMBER +
                "?text=" + encodeURIComponent(whatsappMessage);

            window.open(whatsappURL, "_blank", "noopener,noreferrer");
        });
    }

    // Demo testimonial slider.
    // Replace these examples with verified customer reviews before publishing.
    const testimonials = [
        {
            text: "Bagian ini dapat menampilkan pengalaman pelanggan setelah menjalani perawatan di klinik.",
            name: "Customer Experience",
            role: "AURA Skin Lab"
        },
        {
            text: "Tambahkan ulasan pelanggan asli mengenai pelayanan dan pengalaman konsultasi mereka.",
            name: "Customer Review",
            role: "Verified Customer"
        },
        {
            text: "Tampilkan pengalaman yang jujur dan relevan untuk membantu calon pelanggan memahami layanan.",
            name: "Client Story",
            role: "AURA Skin Lab"
        }
    ];

    let testimonialIndex = 0;

    const testimonialText = document.getElementById("testimonialText");
    const testimonialName = document.getElementById("testimonialName");
    const testimonialRole = document.getElementById("testimonialRole");
    const testimonialCount = document.getElementById("testimonialCount");

    function renderTestimonial() {
        const item = testimonials[testimonialIndex];

        if (!item || !testimonialText) {
            return;
        }

        testimonialText.textContent = item.text;
        testimonialName.textContent = item.name;
        testimonialRole.textContent = item.role;
        testimonialCount.textContent =
            String(testimonialIndex + 1).padStart(2, "0") +
            " / " +
            String(testimonials.length).padStart(2, "0");
    }

    const testimonialPrev = document.getElementById("testimonialPrev");
    const testimonialNext = document.getElementById("testimonialNext");

    if (testimonialPrev) {
        testimonialPrev.addEventListener("click", function () {
            testimonialIndex =
                (testimonialIndex - 1 + testimonials.length) %
                testimonials.length;

            renderTestimonial();
        });
    }

    if (testimonialNext) {
        testimonialNext.addEventListener("click", function () {
            testimonialIndex =
                (testimonialIndex + 1) % testimonials.length;

            renderTestimonial();
        });
    }

    renderTestimonial();

    // Optional smooth reveal effect for major sections.
    // Content remains visible if IntersectionObserver is unavailable.
    if ("IntersectionObserver" in window) {
        const revealTargets = document.querySelectorAll(
            ".treatment-card, .feature-item, .package-card, .therapist-card"
        );

        const revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12
        });

        revealTargets.forEach(function (element) {
            element.classList.add("reveal-ready");
            revealObserver.observe(element);
        });
    }
});
