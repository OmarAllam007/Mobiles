<?php

namespace App\Jobs;

use App\Brand;
use App\Mobile;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadMobilesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @param $request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function handle()
    {
        $brands = Brand::all()->each(function ($brand) {
            return $brand->name = strtolower($brand->name);
        });


        /** @var UploadedFile $mobilesFile */
        $mobilesFile = $this->request->mobiles;

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($mobilesFile);
        $sheet = $spreadsheet->getSheet(0);
        $rows = $sheet->getRowIterator(0);
        foreach ($rows as $row) {
            $cells = $row->getCellIterator();
            $data = $this->getDataFromCells($cells);

            if (!array_filter($data) || $row->getRowIndex() == 1) {
                continue;
            }
            if (!$brands->where('name', strtolower($data[0]))->first()) {
                $brand = Brand::create(['name' => $data[0], 'image_path' => '']);
                $brands->push($brand);
            }

            $brand = $brands->where('name', strtolower($data[0]))->first();
            $this->createMobile($brand, $data);


        }
    }

    protected function getDataFromCells($cells)
    {
        $data = [];
        /** @var \PHPExcel_Cell $cell */
        /** @var \PHPExcel_Worksheet_CellIterator $cells */
        foreach ($cells as $cell) {
            $data[] = $cell->getValue();
        }
        return array_map('trim', $data);
    }

    /**
     * Get the job identifier.
     *
     * @return string
     */
    public function getJobId()
    {
        // TODO: Implement getJobId() method.
    }

    /**
     * Get the raw body of the job.
     *
     * @return string
     */
    public function getRawBody()
    {
        // TODO: Implement getRawBody() method.
    }

    private function createMobile($brand, $data)
    {
        $mobile = Mobile::where('name', $data[1])->first();
        if (!$mobile) {
            Mobile::create([
                'brand_id' => $brand->id,
                'name' => $data[1],
                'released_date' => $this->getReleaseDate($data[10]),
                'communication_network' => $this->getCommunicationNewtork(array_slice($data, 3, 3)),
                'device_dimension' => $data[11],
                'device_weight' => $data[12] . ' g',
                'device_number_of_sims' => $this->getSizeOfSim($data[14]) ?? 0,
                'device_size_of_sim' => $data[14] ?? '',
                'screen_technology' => $this->getScreenTechnology($data[15])[0] ?? '',
                'screen_colors' => $this->getScreenTechnology($data[15])[1] ?? '',
                'screen_size' => $this->getScreenSize($data[16])[0] ?? '',
                'screen_size_percentage' => $this->getScreenSize($data[16])[1] ?? '',
                'screen_resolution' => $this->getScreenResolution($data[17])[0] ?? '',
                'screen_density_of_pixels' => $this->getScreenResolution($data[17])[2] ?? '',
                'operating_system' => $data[18] ?? '',
                'chipset' => $data[20] ?? '',
                'graphical_processor' => $data[21] ?? '',
                'internal_storage' => $this->getInternalStorage($data[23]) ?? '',
                'ram' => $this->getRam($data[24]),
                'main_ram_description' => trim(implode("",$this->getRam($data[24]))),
                'camera_main_camera' => $this->getMainCamera($data[25])[0] ?? '',
                'main_camera_pixels_description' => $this->getMainCamera($data[25])[0] ?? '',
                'camera_flash' => $this->getMainCamera($data[25])[1] ?? '',
                'camera_lens_aperture' => $this->getMainCamera($data[25])[2] ?? '',
                'camera_focal_length' => $this->getMainCamera($data[25])[3] ?? '',
                'camera_other_features' => $this->getMainCamera($data[25])[4] ?? '',
                'camera_video' => $this->getMainCamera($data[25])[5] ?? '',
                'camera_front_camera' => $data[26] ?? '',
                'media_speaker' => $data[27],
                'media_is_35_mm_slot' => strtolower($data[28]) == "Yes" ? 1 : 0,
                'media_radio_exist' => $data[33] != "" ? 1 : 0,
                'communication_wifi' => $data[29],
                'communication_bluetooth' => $data[30],
                'communication_nfc' => $data[32] != "" ? 1 : 0,
                'communication_usb' => $data[34] ?? '',
                'others_gps' => $data[31],
                'others_sensors' => $data[35],
                'battery_type' => $this->getBattery($data[36])[0] ?? '',
                'battery_is_removable' => $this->getBattery($data[36])[1],
                'colors' => str_replace("|", ",", $data[37]),
                'price' => $data[38] ? number_format($data[38] * 1.14,2) : 0,
                'main_price_description' => $data[38] ? number_format($data[38] * 1.14,2) : 'Not determined',
                'image_path' => $this->getImagePath($data[39])
            ]);
        }
    }

    private function getCommunicationNewtork($communication_network)
    {
        $arr = [];
        foreach ($communication_network as $key => $item) {
            if ($item != "" || $item != "N/A") {
                $arr[$key] = $key + 1;
            }
        }
        return $arr;
    }

    private function getReleaseDate($data)
    {
        $pos = strpos($data, "Released");
        if ($pos) {
            $full_string = substr($data, $pos);
            $year = substr($full_string, strpos($full_string, " ") + 1, 4);
            $year_month = substr($full_string, strpos($full_string, " ") + 1);
            $month = substr($year_month, strpos($year_month, " ") + 2);
            $month_number = date('m', strtotime($month));

            $date = Carbon::parse($year . "-" . $month_number . "-01")->format('Y-m-d');
            return $date;
        }

    }

    private function getSizeOfSim($data)
    {
        $no = 0;

        if (str_contains(strtolower($data), "dual")) {
            $no = 2;
        } elseif (str_contains(strtolower($data), "single")) {
            $no = 1;
        } elseif (str_contains(strtolower($data), "triple")) {
            $no = 3;
        }
        return $no;
    }

    private function getScreenTechnology($screen_technology)
    {
        $pos = strpos(strtolower($screen_technology), "touchscreen");
        $screen_tech = substr($screen_technology, 0, $pos + 11);
        $screen_colors = trim(substr($screen_technology, $pos + 11));

        return [$screen_tech, $screen_colors];
    }

    private function getScreenSize($display_size)
    {
        $pos = strpos(strtolower($display_size), "(");
        $screen_size = substr($display_size, 0, $pos);

        $screen_size_percentage = substr($display_size, $pos);

        return [$screen_size, $screen_size_percentage];
    }

    private function getScreenResolution($data)
    {
        $pos = strpos(strtolower($data), "(");
        $screen_resolution = trim(substr($data, 0, $pos));

        $screen_density_of_pixels = trim(substr($data, $pos));

        return [$screen_resolution, $screen_density_of_pixels];
    }

    private function getInternalStorage($storage)
    {
        // dd($storage);
        $internal = [];
        $pos = strpos(strtolower($storage), "gb");
        if ($pos) {
            $numbers = explode("/", substr($storage, 0, $pos));
            $internal = $numbers;
        }

        return $internal;
    }

    private function getRam($ram)
    {
        $f_ram = [];
        $pos_gb = strpos(strtolower($ram), "gb");
        $pos_mb = strpos(strtolower($ram), "mb");

        if ($pos_gb) {
            $numbers = substr($ram, 0, $pos_gb);
            $f_ram[0] = $numbers;
        } elseif ($pos_mb) {
            $numbers = substr($ram, 0, $pos_mb);
            $f_ram[0] = $numbers;
        }

        return $f_ram;
    }

    private function getMainCamera($main_camera)
    {
        $numbers = explode("|", $main_camera);
        $specs_arr = array_map('trim', $numbers);

        $mb = $specs_arr[0];
        $flash = "";
        $aperture = "";
        $focal = "";
        $other = "";
        $video = "";
        $in_other = [];
        $in_aperture = [];
        $in_video = [];
        foreach ($specs_arr as $key => $spec) {
            $flash_pos = strpos(strtolower($spec), "flash");
            if ($flash_pos) {
                $flash .= $spec;
            }

            if (substr($spec, 0, 2) == "f/") {
                $in_aperture[$key] = str_replace(["(", ")"], "", $spec . " ");
                $aperture = implode(", ", array_map("trim", $in_aperture));
            }
            $focal_pos = strpos(strtolower($spec), "mm");

            if ($focal_pos) {
                $focal = str_replace(["(", ")"], "", $spec);
            }

            $other_pos = array_search(strtolower($spec), ["autofocus", "hdr", "detection", "panorama"]);
            if ($other_pos) {
                $in_other[$key] = $spec;
                $other = implode(", ", array_map("trim", $in_other));
            }

            $video_pos = strpos($spec, "fps");
            if ($video_pos) {
                $in_video[$key] = $spec;
                $video = implode(", ", array_map("trim", $in_video));
            }


        }
        return [$mb, $flash, $aperture, $focal, $other, $video];
    }

    private function getBattery($battery)
    {
        $is_removable = 1;

        $battery_type_non = strpos(strtolower($battery), strtolower("non-removable"));
        if ($battery_type_non) {
            $is_removable = 0;
        }

        $type = str_replace(["Non-removable", "Removable", "non-removable", "removable"], "", $battery);

        return [$type, $is_removable];
    }

    private function getImagePath($image)
    {
        $info = pathinfo($image);
        $image_file = file_get_contents($image);
        $file = storage_path('app/public/mobile_images/').$info["basename"];
        file_put_contents($file, $image_file);
        $uploadedFile = new UploadedFile($file,$info["basename"]);

        $final_path = '/mobile_images/' . $info["basename"];

        return $final_path;
    }


}
