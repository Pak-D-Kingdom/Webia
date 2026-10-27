<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaAddon;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminMasterDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_list_packages_and_addons(): void
    {
        $admin = User::factory()->admin()->create();
        WebiaPackage::factory()->create(['name' => 'Pixel']);
        WebiaAddon::factory()->create(['name' => 'SEO Optimization']);

        $this->actingAs($admin)->get(route('admin.packages.index'))
            ->assertOk()
            ->assertSee('Pixel');

        $this->actingAs($admin)->get(route('admin.addons.index'))
            ->assertOk()
            ->assertSee('SEO Optimization');
    }

    public function test_admin_can_create_package(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->post(route('admin.packages.store'), [
            'name' => 'Pixel',
            'slug' => 'pixel',
            'description' => 'Landing page sederhana.',
            'price' => 499000,
            'cms_enabled' => false,
            'chatbot_monthly_quota' => 500,
            'features' => "Landing page\nWhatsApp dan peta",
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $response->assertRedirect(route('admin.packages.index'));
        $this->assertDatabaseHas('webia_packages', [
            'slug' => 'pixel',
            'price' => 499000,
        ]);
    }

    public function test_admin_can_toggle_addon_active_state(): void
    {
        $admin = User::factory()->admin()->create();
        $addon = WebiaAddon::factory()->create(['is_active' => true]);

        $this->actingAs($admin)
            ->post(route('admin.addons.toggle', $addon))
            ->assertRedirect(route('admin.addons.index'));

        $this->assertDatabaseHas('webia_addons', ['id' => $addon->id, 'is_active' => false]);
    }

    public function test_admin_can_toggle_package_active_state(): void
    {
        $admin = User::factory()->admin()->create();
        $package = WebiaPackage::factory()->create(['is_active' => true]);

        $this->actingAs($admin)
            ->post(route('admin.packages.toggle', $package))
            ->assertRedirect(route('admin.packages.index'));

        $this->assertDatabaseHas('webia_packages', ['id' => $package->id, 'is_active' => false]);
    }

    public function test_admin_cannot_delete_package_used_by_order(): void
    {
        $admin = User::factory()->admin()->create();
        $package = WebiaPackage::factory()->create();
        WebiaOrder::factory()->create(['webia_package_id' => $package->id]);

        $this->actingAs($admin)
            ->from(route('admin.packages.index'))
            ->delete(route('admin.packages.destroy', $package))
            ->assertRedirect(route('admin.packages.index'))
            ->assertSessionHasErrors('package');

        $this->assertDatabaseHas('webia_packages', ['id' => $package->id]);
    }

    public function test_package_features_cannot_be_blank(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)->post(route('admin.packages.store'), [
            'name' => 'Pixel',
            'slug' => 'pixel',
            'description' => 'Landing page sederhana.',
            'price' => 499000,
            'chatbot_monthly_quota' => 500,
            'features' => "  \n ",
            'sort_order' => 1,
        ])->assertSessionHasErrors('features');
    }

    public function test_admin_can_update_and_delete_addon(): void
    {
        $admin = User::factory()->admin()->create();
        $addon = WebiaAddon::factory()->create();

        $this->actingAs($admin)->put(route('admin.addons.update', $addon), [
            'name' => 'SEO Optimization',
            'description' => 'Optimasi teknis dan konten.',
            'price' => 250000,
            'is_active' => true,
        ])->assertRedirect(route('admin.addons.index'));

        $this->assertDatabaseHas('webia_addons', [
            'id' => $addon->id,
            'name' => 'SEO Optimization',
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.addons.destroy', $addon))
            ->assertRedirect(route('admin.addons.index'));

        $this->assertDatabaseMissing('webia_addons', ['id' => $addon->id]);
    }

    public function test_customer_cannot_access_master_data(): void
    {
        $customer = User::factory()->create();

        $this->actingAs($customer)
            ->get(route('admin.packages.index'))
            ->assertForbidden();
    }
}
