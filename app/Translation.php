<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['original_word', 'to', 'translated_word'];
    static $languages = [0 => 'en', 1 => 'ar'];


    static function getSearchComponent()
    {
        return [
            'Devices' => t('Devices'),
            'Latest Visited' => t('Latest Visited'),
            'Release Date' => t('Release Date'),
            'Price' => t('Price'),
            'Search' => t('Search'),
            'No Mobiles found' => t('No Mobiles found')
        ];
    }

    static function getPricesComponent()
    {
        return [
            'Search with price' => t('Search with price'),
            'No Mobiles found' => t('No Mobiles found'),
        ];
    }

    static function getLikeComponent()
    {
        return [
            'Please Login First' => t('Please Login First'),
        ];
    }

    static function getCompareComponent()
    {
        return [
            'Compare' => t('Compare'),
            'Add' => t('Add'),
            'Remove' => t('Remove'),
            'Back' => t('Back'),
            'General Feature' => t('General Feature'),
            'Image' => t('Image'),
            'Name' => t('Name'),
            'Operating System' => t('Operating System'),
            'Size' => t('Size'),
            'Weight' => t('Weight'),
            'Material Of Manufacture' => t('Material Of Manufacture'),
            'No. of SIMs' => t('No. of SIMs'),
            'Size of SIM' => t('Size of SIM'),
            'Screen' => t('Screen'),
            'Screen Size' => t('Screen Size'),
            'Screen Size Percentage' => t('Screen Size Percentage'),
            'Resolution' => t('Resolution'),
            'Screen Dimensions' => t('Screen Dimensions'),
            'Density of Pixels' => t('Density of Pixels'),
            'Screen Technology' => t('Screen Technology'),
            'Screen Colors' => t('Screen Colors'),
            'Touch' => t('Touch'),
            'Screen Protection' => t('Screen Protection'),
            'Extra Features' => t('Extra Features'),
            'Storage' => t('Storage'),
            'Internal Storage' => t('Internal Storage'),
            'Enter Mobile Name' => t('Enter Mobile Name'),
            'RAM' => t('RAM'),
            'External Storage' => t('External Storage'),
            'Camera' => t('Camera'),
            'Main Camera' => t('Main Camera'),
            'Front Camera' => t('Front Camera'),
            'Front Camera Feature' => t('Front Camera Feature'),
            'Video' => t('Video'),
            'Flash' => t('Flash'),
            'Aperture' => t('Aperture'),
            'Sensor Size' => t('Sensor Size'),
            'Focal Length' => t('Focal Length'),
            'Other Features' => t('Other Features'),
            'Hardware' => t('Hardware'),
            'Processor' => t('Processor'),
            'Graphical Processor' => t('Graphical Processor'),

            'Chipset' => t('Chipset'),
            'Battery' => t('Battery'),
            'Type' => t('Type'),
            'Calls' => t('Calls'),
            'Music' => t('Music'),
            'Media' => t('Media'),
            'Radio' => t('Radio'),
            'Speakers' => t('Speakers'),
            '3.5mm Slot' => t('3.5mm Slot'),
            'Communication' => t('Communication'),
            'Network' => t('Network'),
            'Bluetooth' => t('Bluetooth'),
            'WIFI' => t('WIFI'),
            'USB' => t('USB'),
            'Hotspot' => t('Hotspot'),
            'NFC' => t('NFC'),
            'OTG' => t('OTG'),
            'IR' => t('IR'),
            'Others' => t('Others'),
            'GPS' => t('GPS'),
            'Sensors' => t('Sensors'),
            'Open By' => t('Open By'),
            'VR' => t('VR'),
            'Notifications LED' => t('Notifications LED'),
            'Additional Microphone' => t('Additional Microphone'),
            'Purchase' => t('Purchase'),
            'Colors' => t('Colors'),
            'Price' => t('Price'),
            'Purchase From' => t('Purchase From'),
            'Amazon' => t('Amazon'),
            'Souq' => t('Souq'),
            'JUMIA' => t('JUMIA'),
        ];
    }

    static function getChooseComponent()
    {
        return [
            'Brand' => t('Brand'),
            'Rear Camera' => t('Rear Camera'),
            'Front Camera' => t('Front Camera'),
            'RAM (at least)' => t('RAM (at least)'),
            'Battery (mAh)' => t('Battery (mAh)'),
            'Price From ($)' => t('Price From ($)'),
            'Price To ($)' => t('Price To ($)'),
            'Top 10 By Price' => t('Top 10 By Price'),
            'There are no results matching your search' =>
                t('There are no results matching your search'),

        ];
    }

    static function getCommentComponent()
    {
        return [
            'Name' => t('Name'),
            'Enter your comment' => t('Enter your comment'),
            'Post' => t('Post'),
        ];
    }
}
