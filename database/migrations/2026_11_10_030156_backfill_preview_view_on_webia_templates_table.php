<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $previewViews = [
            '/webia/template/nantara-architecture-traditional-cultural' => 'website-bisnis.templates.interior-architecture.architecture-building-design.nantara-architecture.nantara-architecture',
            '/webia/template/aurelia-home-renovation' => 'website-bisnis.templates.home-services.home-renovation-repair.aurelia.aurelia',
            '/webia/template/matcha-clean-organic-deep-cleaning' => 'website-bisnis.templates.home-services.home-cleaning-deep-cleaning.matcha-clean.matcha-clean',
            '/webia/template/aurumco-catering' => 'website-bisnis.templates.fnb.aurumco-catering',
            '/webia/template/vallaco-catering' => 'website-bisnis.templates.fnb.vallaco-catering',
            '/webia/template/rasa-rupa-artistik' => 'website-bisnis.templates.fnb.rasa-rupa-artistik',
            '/webia/template/tetangga-kenyang-friendly' => 'website-bisnis.templates.fnb.tetangga-kenyang-friendly',
            '/webia/template/hulu-pantry-asal-usul' => 'website-bisnis.templates.fnb.hulu-pantry-asal-usul',
            '/webia/template/kusuma-ningrat-royal-heritage' => 'website-bisnis.templates.fnb.kusuma-ningrat-royal-heritage',
            '/webia/template/nuvia-skin-tech-clinic' => 'website-bisnis.templates.beauty.nuvia-skin-tech-clinic',
            '/webia/template/glow-lab-creative-beauty-clinic' => 'website-bisnis.templates.beauty.glow-lab-creative-beauty-clinic',
            '/webia/template/atelier-kulit-creative-beauty-clinic' => 'website-bisnis.templates.beauty.atelier-kulit-creative-beauty-clinic',
            '/webia/template/tanah-warna-rustic-makeup-artist' => 'website-bisnis.templates.beauty.tanah-warna-rustic-makeup-artist',
            '/webia/template/rosalind-vintage-makeup-artist' => 'website-bisnis.templates.beauty.rosalind-vintage-makeup-artist',
            '/webia/template/visage-editorial-makeup-artist' => 'website-bisnis.templates.beauty.visage-editorial-makeup-artist',
            '/webia/template/voltrix-futuristic-automotive' => 'website-bisnis.templates.automotive.voltrix-futuristic-automotive',
            '/webia/template/nightshift-dark-mode-automotive' => 'website-bisnis.templates.automotive.nightshift-dark-mode-automotive',
            '/webia/template/arvo-modern-automotive' => 'website-bisnis.templates.automotive.arvo-modern-automotive',
            '/webia/template/apex-heritage-automotive-elegant' => 'website-bisnis.templates.automotive.apex-heritage-automotive-elegant',
            '/webia/template/apex-scuderia-automotive-minimalist' => 'website-bisnis.templates.automotive.apex-scuderia-automotive-minimalist',
            '/webia/template/samudra-auto-detailing-artistic' => 'website-bisnis.templates.automotive.samudra-auto-detailing-artistic',
            '/webia/template/noir-auto-detailing-luxury' => 'website-bisnis.templates.automotive.noir-auto-detailing-luxury',
            '/webia/template/aurum-premium-auto-detailing' => 'website-bisnis.templates.automotive.aurum-premium-auto-detailing',
            '/webia/template/otto-artistic-workshop' => 'website-bisnis.templates.automotive.otto-artistic-workshop',
            '/webia/template/maison-otto-elegant-workshop' => 'website-bisnis.templates.automotive.maison-otto-elegant-workshop',
            '/webia/template/roseline-professional-workshop' => 'website-bisnis.templates.automotive.roseline-professional-workshop',
            '/webia/template/bangun-karsa-contractor-professional' => 'website-bisnis.templates.company.bangun-karsa-contractor-professional',
            '/webia/template/langit-karya-contractor-minimalist' => 'website-bisnis.templates.company.langit-karya-contractor-minimalist',
            '/webia/template/denim-horizon-property-minimalist' => 'website-bisnis.templates.property.property-minimalist',
            '/webia/template/pusaka-asri-property-traditional' => 'website-bisnis.templates.property.property-traditional',
            '/webia/template/agriternak-organic-ethical-precision' => 'website-bisnis.templates.agriculture.agriternak-organic-ethical-precision',
            '/webia/template/agriternak-futuristic-iot' => 'website-bisnis.templates.agriculture.agriternak-futuristic-iot',
            '/webia/template/agriternak-bold-livestock' => 'website-bisnis.templates.agriculture.agriternak-bold-livestock',
            '/webia/template/fnb-bakery-playful-colorful' => 'website-bisnis.templates.fnb.bakery.bakery-playful-colorful',
            '/webia/template/bakery-bold-luxury' => 'website-bisnis.templates.fnb.bakery.bakery-bold-luxury',
            '/webia/template/midnightbaker-futuristic' => 'website-bisnis.templates.fnb.bakery.midnightbaker-futuristic',
            '/webia/template/paws-clever-creative' => 'website-bisnis.templates.pet-animal-service.paws-clever-creative',
            '/webia/template/paws-joy-jellypop' => 'website-bisnis.templates.pet-animal-service.paws-joy-jellypop',
            '/webia/template/paws-canine-terra-earth-tone' => 'website-bisnis.templates.pet-animal-service.paws-canine-terra-earth-tone',
            '/webia/template/pawtopia-animal-care' => 'website-bisnis.templates.pet-animal-service.pawtopia-animal-care',
            '/webia/template/nail-art-professional-soft-pink' => 'website-bisnis.templates.beauty.nailart.nailart-professional-softpink',
            '/webia/template/nail-art-minimalist-sage-green' => 'website-bisnis.templates.beauty.nailart.nailart-minimalist-sagegreen',
            '/webia/template/nail-art-luxury-yellow-sunshine' => 'website-bisnis.templates.beauty.nailart.nailart-luxury-yellowsunshine',
            '/webia/template/laut-biru-seafood' => 'website-bisnis.templates.fnb.restaurant.laut-biru-seafood',
            '/webia/template/restoran-azura' => 'website-bisnis.templates.fnb.restaurant.restoran-azura',
            '/webia/template/noir-restaurant' => 'website-bisnis.templates.fnb.restaurant.noir-restaurant',
            '/webia/template/tunas-cendekia-preschool-daycare' => 'website-bisnis.templates.education.preschool.tunas-cendekia-preschool-daycare',
            '/webia/template/rumah-latte-preschool-daycare' => 'website-bisnis.templates.education.preschool.rumah-latte-preschool-daycare',
            '/webia/template/lumiere-photography-studio' => 'website-bisnis.templates.photography.lumiere-photography-studio',
            '/webia/template/noir-studio-photography' => 'website-bisnis.templates.photography.noir-studio-photography',
            '/webia/template/peachy-studio' => 'website-bisnis.templates.photography.peachy-studio',
            '/webia/template/automotive-dealer-vintage' => 'website-bisnis.templates.automotive.dealer.automotive-dealer-vintage',
            '/webia/template/healthcare-dental-mint' => 'website-bisnis.templates.healthcare.dental.mint-dental-house',
            '/webia/template/healthcare-dental-azure' => 'website-bisnis.templates.healthcare.dental.azure-smile-clinic',
            '/webia/template/healthcare-dental-sunset' => 'website-bisnis.templates.healthcare.dental.sunset-dental-care',
            '/webia/template/petshop-minimalist-glacierblue' => 'website-bisnis.templates.pet-animal-service.petshop.glacierblue.petshop-minimalist-glacierblue',
            '/webia/template/petshop-luxury-rosegold' => 'website-bisnis.templates.pet-animal-service.petshop.rosegold.petshop-luxury-rosegold',
            '/webia/template/technology-softwarehouse-professional' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-modern',
            '/webia/template/technology-softwarehouse-elegant-babyblue-putri' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-elegant-babyblue-putri',
            '/webia/template/technology-softwarehouse-minimalist-softpink-putri' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-minimalist-softpink-putri',
            '/webia/template/technology-dataanalytics-luxury-pastelmix-putri' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-luxury-pastelmix-putri',
            '/webia/template/technology-dataanalytics-corporate-oceanteal-putri' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-corporate-oceanteal-putri',
            '/webia/template/technology-dataanalytics-creative-arcticfrost-putri' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-creative-arcticfrost-putri',
            '/webia/template/agriculture-peralatanpertanian-corporate-sagegreen-putri' => 'website-bisnis.templates.agriculture.peralatan-pertanian.agriculture-peralatanpertanian-corporate-sagegreen-putri',
            '/webia/template/sports-gym-bold' => 'website-bisnis.templates.sports-fitness.gym.sports-gym-bold',
            '/webia/template/education-onlinecourse-modern' => 'website-bisnis.templates.education.online-course.education-onlinecourse-modern',
            '/webia/template/spark-academy-maximum-impact' => 'website-bisnis.templates.education.spark-academy-maximum-impact',
            '/webia/template/ruby-academy-classic-school' => 'website-bisnis.templates.education.ruby-academy-classic-school',
            '/webia/template/arctic-academy-school' => 'website-bisnis.templates.education.arctic-academy-school',
            '/webia/template/education/preschool-daycare-jeli-kecil' => 'website-bisnis.template.education.preschool-daycare-jeli-kecil.index',
            '/webia/template/healthcare/psychology/ruang-tenang' => 'website-bisnis.template.healthcare.psychology.ruang-tenang.index',
            '/webia/template/healthcare/psychology/mitra-jiwa' => 'website-bisnis.templates.healthcare.psychology.mitra-jiwa',
            '/webia/template/wedding-organizer-elegant' => 'website-bisnis.templates.wedding-event.wedding-organizer.wedding-organizer-elegant',
            '/webia/template/tidal-detail-artistic-automotive' => 'website-bisnis.templates.automotive.artistic',
            '/webia/template/noir-atelier-luxury-automotive' => 'website-bisnis.templates.automotive.luxury',
            '/webia/template/form-auto-care-minimal-automotive' => 'website-bisnis.templates.automotive.minimal',
        ];

        foreach ($previewViews as $templateUrl => $previewView) {
            DB::table('webia_templates')
                ->where('template_url', $templateUrl)
                ->update(['preview_view' => $previewView]);
        }
    }

    public function down(): void
    {
        DB::table('webia_templates')->update(['preview_view' => null]);
    }
};
