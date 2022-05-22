<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class NxtConversion extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Nxt Conversion';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Nxt Conversion | Options';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $nxtConversion = new FieldsBuilder('nxt_conversion');

        $nxtConversion
            ->addTab('general_tab', [
                'label' => 'General Infos'
            ])
            ->addText('video_url_yt_id',[
                'label' => 'Video Url Youtube Id',
                'instructions' => 'Just add the youtube id',
                'prepend' => 'XXXXXXXXXXX',
                'required' => 0,
            ]);

        $nxtConversion
            ->addTab('testimonial_tab', [
                'label' => 'Testimonials'
            ])
            ->addRepeater('testimonials')
                ->addTextarea('testimonial_description', [
                    'label' => 'Testimonial Text',
                    'instructions' => 'Text inside the testimonial section',
                    'required' => 1,
                ])
                ->addText('testimonial_author', [
                    'label' => 'Testimonial Author',
                    'instructions' => 'H4 Title of the testimonial',
                    'required' => 1,
                ])
                ->addImage('testimonial_avatar', [
                    'label' => 'Testimonial Avatar',
                ])
            ->endRepeater();

        return $nxtConversion->build();
    }
}
