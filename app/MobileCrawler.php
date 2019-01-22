<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 20/01/2019
 * Time: 8:09 PM
 */

namespace App;


use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Symfony\Component\DomCrawler\Crawler;

class MobileCrawler
{
    function getMobData($url, $brand_id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);


        $crawler = new Crawler();
        $crawler->addHtmlContent($content = $response->getBody()->getContents());

        $data = [];

        $name = $crawler->filter('h1[data-spec="modelname"]')->text();
        $mob = Mobile::where('name', $name)->first();

        if (!$mob) {
            $data = [
                'name' => $crawler->filter('h1[data-spec="modelname"]')->text(),
                'brand_id' => $brand_id,
                'release_date' => $crawler->filter('td[data-spec="status"]')->count() ? $this->getReleaseDate($crawler->filter('td[data-spec="status"]')->text()) : '',
                'operating_system' => $crawler->filter('td[data-spec="os"]')->count() ? $crawler->filter('td[data-spec="os"]')->text() : '',
                'device_dimension' => $crawler->filter('td[data-spec="dimensions"]')->count() ? $this->getDimensions($crawler->filter('td[data-spec="dimensions"]')->text()) : '',
                'device_weight' => $crawler->filter('td[data-spec="weight"]')->count() ? $this->getWeight($crawler->filter('td[data-spec="weight"]')->text()) : '',
                'device_m_o_m' => $crawler->filter('td[data-spec="build"]')->count() ? $crawler->filter('td[data-spec="build"]')->text() : '',
                'device_number_of_sims' => $crawler->filter('td[data-spec="sim"]')->count() ? $this->getNoSim($crawler->filter('td[data-spec="sim"]')->text()) : '',
                'device_size_of_sim' => $crawler->filter('td[data-spec="sim"]')->count() ? $crawler->filter('td[data-spec="sim"]')->text() : '',
                'processor' => $crawler->filter('td[data-spec="cpu"]')->count() ? $crawler->filter('td[data-spec="cpu"]')->text() : '',
                'chipset' => $crawler->filter('td[data-spec="chipset"]')->count() ? $crawler->filter('td[data-spec="chipset"]')->text() : '',
                'graphical_processor' => $crawler->filter('td[data-spec="gpu"]')->count() ? $crawler->filter('td[data-spec="gpu"]')->text() : '',
                'external_storage' => $crawler->filter('td[data-spec="memoryslot"]')->count() ? $this->getExternalStorage($crawler->filter('td[data-spec="memoryslot"]')->text()) : '',
                'screen_size' => $crawler->filter('td[data-spec="displaysize"]')->count() ? $this->getScreenSize($crawler->filter('td[data-spec="displaysize"]')->text())['size'] : '',
                'screen_size_percentage' => $crawler->filter('td[data-spec="displaysize"]')->count() ? $this->getScreenSize($crawler->filter('td[data-spec="displaysize"]')->text())['percentage'] : '',
                'screen_resolution' => $crawler->filter('td[data-spec="displayresolution"]')->count() ? $this->getScreenResolution($crawler->filter('td[data-spec="displayresolution"]')->text())['resolution'] : '',
                'screen_dimensions' => $crawler->filter('td[data-spec="displayresolution"]')->count() ? $this->getScreenResolution($crawler->filter('td[data-spec="displayresolution"]')->text())['ratio'] : '',
                'screen_density_of_pixels' => $crawler->filter('td[data-spec="displayresolution"]')->count() ? $this->getScreenResolution($crawler->filter('td[data-spec="displayresolution"]')->text())['ppi'] : '',
                'screen_technology' => $crawler->filter('td[data-spec="displaytype"]')->count() ? $this->getScreenTechnology($crawler->filter('td[data-spec="displaytype"]')->text())["screen_technology"] : '',
                'screen_colors' => $crawler->filter('td[data-spec="displaytype"]')->count() ? $this->getScreenTechnology($crawler->filter('td[data-spec="displaytype"]')->text())["screen_colors"] : '',
                'screen_touch_features' => $crawler->filter('td[data-spec="displaytype"]')->count() ? $this->getScreenTechnology($crawler->filter('td[data-spec="displaytype"]')->text())["screen_touch_features"] : '',
                'screen_protection' => $crawler->filter('td[data-spec="displayprotection"]')->count() ? $crawler->filter('td[data-spec="displayprotection"]')->text() : '',
                'screen_extra_features' => $crawler->filter('td[data-spec="displayother"]')->count() ? $crawler->filter('td[data-spec="displayother"]')->text() : '',
                'camera_main_camera' => $crawler->filter('td[data-spec="cam1modules"]')->count() ? $this->getCameraDetails($crawler->filter('td[data-spec="cam1modules"]')->text())['camera_main_camera'] : '',
                'camera_lens_aperture' => $crawler->filter('td[data-spec="cam1modules"]')->count() ? $this->getCameraDetails($crawler->filter('td[data-spec="cam1modules"]')->text())['camera_lens_aperture'] : '',
                'camera_focal_length' => $crawler->filter('td[data-spec="cam1modules"]')->count() ? $this->getCameraDetails($crawler->filter('td[data-spec="cam1modules"]')->text())['camera_focal_length'] : '',
                'camera_sensor_size' => $crawler->filter('td[data-spec="cam1modules"]')->count() ? $this->getCameraDetails($crawler->filter('td[data-spec="cam1modules"]')->text())['camera_sensor_size'] : '',
                'camera_flash' => $crawler->filter('td[data-spec="cam1features"]')->count() ? $this->getCameraFlashAndOtherFeatures($crawler->filter('td[data-spec="cam1features"]')->text())['camera_flash'] : '',
                'camera_other_features' => $crawler->filter('td[data-spec="cam1features"]')->count() ? $this->getCameraFlashAndOtherFeatures($crawler->filter('td[data-spec="cam1features"]')->text())['camera_other_features'] : '',
                'camera_video' => $crawler->filter('td[data-spec="cam1features"]')->count() ? $crawler->filter('td[data-spec="cam1video"]')->text() : '',
                'camera_front_camera' => $crawler->filter('td[data-spec="cam2modules"]')->count() ? $crawler->filter('td[data-spec="cam2modules"]')->text() : '',
                'camera_front_camera_features' => $crawler->filter('td[data-spec="cam2video"]')->count() ? $crawler->filter('td[data-spec="cam2video"]')->text() . ', ' : '' . $crawler->filter('td[data-spec="cam2features"]')->count() ? $crawler->filter('td[data-spec="cam2features"]')->text() : '',
                'battery_type' => $crawler->filter('td[data-spec="batdescription1"]')->count() ? $this->getBatteryDetails($crawler->filter('td[data-spec="batdescription1"]')->text())['battery_type'] : '',
                'battery_is_removable' => $crawler->filter('td[data-spec="batdescription1"]')->count() ? $this->getBatteryDetails($crawler->filter('td[data-spec="batdescription1"]')->text())['battery_is_removable'] : '',
                'main_battery_description' => $crawler->filter('td[data-spec="batdescription1"]')->count() ? $this->getBatteryDetails($crawler->filter('td[data-spec="batdescription1"]')->text())['main_battery_description'] : '',
                'battery_calls_until' => $crawler->filter('td[data-spec="battalktime1"]')->count() ? $crawler->filter('td[data-spec="battalktime1"]')->text() : '',
                'battery_music_until' => $crawler->filter('td[data-spec="batmusicplayback1"]')->count() ? $crawler->filter('td[data-spec="batmusicplayback1"]')->text() : '',
                'communication_network' => $crawler->filter('a[data-spec="nettech"]')->count() ? $this->getNetworkType($crawler->filter('a[data-spec="nettech"]')->text()) : '',
                'communication_bluetooth' => $crawler->filter('td[data-spec="bluetooth"]')->count() ? $crawler->filter('td[data-spec="bluetooth"]')->text() : '',
                'communication_wifi' => $crawler->filter('td[data-spec="wlan"]')->count() ? $crawler->filter('td[data-spec="wlan"]')->text() : '',
                'communication_hotspot' => $crawler->filter('td[data-spec="wlan"]')->count() ? $this->hasHotspot($crawler->filter('td[data-spec="wlan"]')->text()) : '',
                'communication_nfc' => $crawler->filter('td[data-spec="nfc"]')->count() ? $this->hasNFC($crawler->filter('td[data-spec="nfc"]')->text()) : '',
                'communication_usb' => $crawler->filter('td[data-spec="usb"]')->count() ? $crawler->filter('td[data-spec="usb"]')->text() : '',
                'media_radio_exist' => $crawler->filter('td[data-spec="radio"]')->count() ? $this->hasRadio($crawler->filter('td[data-spec="radio"]')->text()) : '',
                'others_sensors' => $crawler->filter('td[data-spec="sensors"]')->count() ? $crawler->filter('td[data-spec="sensors"]')->text() : '',
                'colors' => $crawler->filter('td[data-spec="colors"]')->count() ? $crawler->filter('td[data-spec="colors"]')->text() : '',
                'price' => $crawler->filter('td[data-spec="price"]')->count() ? $this->getPrice($crawler->filter('td[data-spec="price"]')->text()) : '',
                'main_price_description' => $crawler->filter('td[data-spec="price"]')->count() ? $this->getPrice($crawler->filter('td[data-spec="price"]')->text()) : '',
                'main_camera_pixels_description' => $crawler->filter('td[data-spec="cam1modules"]')->count() ? $this->getCameraDetails($crawler->filter('td[data-spec="cam1modules"]')->text())['camera_main_camera'] : '',
                'image_path' => $crawler->filter('div.specs-photo-main')->filter('img')->attr('src') ? $this->getImagePath($crawler->filter('div.specs-photo-main')->filter('img')->attr('src')) : ''
            ];
            Mobile::create($data);
        }

    }

    private function getReleaseDate($data)
    {
        $pos = strpos($data, "Released");
        if ($pos) {
            $full_string = substr($data, $pos);
            $year = substr($full_string, strpos($full_string, " ") + 1, 4);
            $year_month = substr($full_string, strpos($full_string, " ") + 1);
            $month = substr($year_month, strpos($year_month, " ") + 1);
            $month_number = date('m', strtotime($month));
            $date = Carbon::parse($year . "-" . $month_number . "-01")->format('Y-m-d');
            return $date;
        }

    }

    private function getImagePath($image)
    {

        $info = pathinfo($image);
        $image_file = file_get_contents($image);
        $file = storage_path('app/public/mobile_images/') . $info["basename"];
        file_put_contents($file, $image_file);
        $uploadedFile = new UploadedFile($file, $info["basename"]);

        $final_path = '/mobile_images/' . $info["basename"];

        return $final_path;
    }

    private function getDimensions($data)
    {
        return trim(substr($data, 0, strpos($data, '(')));
    }

    private function getWeight($data)
    {
        return trim(substr($data, 0, strpos($data, '(')));
    }

    private function getNoSim($data)
    {
        $no = 0;

        if (str_contains(strtolower($data), "dual")) {
            $no = 2;
        } elseif (str_contains(strtolower($data), [strtolower("single"), strtolower("Mini-SIM"), strtolower('Micro-SIM')])) {
            $no = 1;
        } elseif (str_contains(strtolower($data), "triple")) {
            $no = 3;
        }

        return $no;
    }

    private function getInternalMemory($data)
    {
        $full_string = explode(',', $data);

        foreach ($full_string as $string) {
            dd($full_string);
            if (str_contains($string, 'RAM') && str_contains($string, 'GB')) {
                preg_match_all('!\d+!', $string, $matches);

            } else if (str_contains($string, 'GB')) {

            }
        }
        dd('string');
    }

    private function getExternalStorage($string)
    {
        preg_match_all('!\d+!', $string, $matches);
        return $matches[0];
    }

    private function getScreenSize($text)
    {

        $data = [
            'size' => trim(substr($text, 0, strpos($text, '('))),
            'percentage' => substr($text, strpos($text, '(') + 2, 5),
        ];

        return $data;

    }

    private function getScreenResolution($text)
    {
        $ratio = substr($text, strpos($text, ',') + 1);

        $data = [
            'resolution' => trim(substr($text, 0, strpos($text, ','))),
            'ratio' => trim(substr($ratio, 0, strpos($ratio, '('))),
            'ppi' => str_replace(')', '', substr($ratio, strpos($ratio, '(') + 2)),
        ];

        return $data;
    }

    private function getScreenTechnology($string)
    {
        $data = [
            'screen_technology' => trim(substr($string, 0, strpos($string, 'capacitive'))),
            'screen_colors' => trim(substr($string, strpos($string, ',') + 1)),
            'screen_touch_features' => ucfirst(str_replace(",", "", trim(substr($string, strpos($string, 'capacitive'), strpos($string, 'touchscreen')))))
        ];

        return $data;
    }

    private function getCameraDetails($string)
    {

        $string = trim(preg_replace('/\s\s+/', ' ', $string));
        $arr = explode(",", $string);

        $data = [
            'camera_main_camera' => '',
            'camera_lens_aperture' => '',
            'camera_focal_length' => '',
            'camera_sensor_size' => ''
        ];
        foreach ($arr as $item) {
            if (str_contains(strtolower($item), 'mp')) {
                $data['camera_main_camera'] .= trim(substr($item, strpos($item, 'mp') - 5)) . ' ';
            }
            if (str_contains(strtolower($item), 'f/')) {
                $data['camera_lens_aperture'] .= trim($item) . ' ';
            }

            if (str_contains(strtolower($item), 'mm')) {
                $data['camera_focal_length'] .= trim($item) . ' ';
            }

            if (str_contains(strtolower($item), 'sensor')) {
                $data['camera_sensor_size'] .= trim($item) . ' ';
            }
        }

        return array_map('trim', $data);
    }

    private function getCameraFlashAndOtherFeatures($string)
    {
        $data = [
            'camera_flash' => trim(substr($string, 0, strpos($string, ','))),
            'camera_other_features' => trim(substr($string, strpos($string, ',') + 1))
        ];

        return $data;
//        return substr($string, 0, strpos($string, ','));
    }

    private function getBatteryDetails($string)
    {
        $data = [
            'battery_type' => '',
            'battery_is_removable' => 0,
            'main_battery_description' => 0,
        ];

        preg_match_all('!\d+!', $string, $matches);
        if (!str_contains(strtolower($string), 'non-removable')) {
            $data['battery_is_removable'] = 1;
        }
        $data['battery_type'] = substr($string, strpos($string, ' '));
        $data['main_battery_description'] = implode(',', $matches[0]);

        return array_map('trim', $data);
    }

    private function getNetworkType($string)
    {
        $data = [];
        if (str_contains($string, 'GSM')) {
            $data[0] = 1;
        }
        if (str_contains($string, ['HSPDA', 'HSPA'])) {
            $data[1] = 2;
        }
        if (str_contains($string, ['LTE'])) {
            $data[2] = 3;
        }

        return $data;
    }

    private function hasHotspot($string)
    {
        if (str_contains($string, 'hotspot')) {
            return 1;
        }
        return 0;
    }

    private function hasNFC($string)
    {
        if (str_contains(strtolower($string), 'yes')) {
            return 1;
        }
        return 0;
    }

    private function hasRadio($string)
    {
        if (str_contains(strtolower($string), 'no')) {
            return 0;
        }
        return 1;
    }

    private function hasSpeaker($text)
    {

    }

    private function getPrice($string)
    {
        preg_match_all('!\d+!', $string, $matches);
        $price = implode('', $matches[0]) * 1.14;

        return number_format($price, 1);
    }


}