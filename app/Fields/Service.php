<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Service extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $service = new FieldsBuilder('service');

        $service
            ->setLocation('post_type', '==', 'service');

        $service
            ->addTab('general_tab', [
                'label' => 'Service'
            ])
            ->addText('service_title', [
                'label' => 'Service Title',
                'instructions' => 'H1 Title of the service',
                'required' => 0,
            ])
            ->addTextarea('service_description', [
                'label' => 'Service Description',
                'instructions' => 'Description inside the service section',
                'required' => 0,
            ])
            ->addLink('service_link_url',[
                'label' => 'Service Link Url'
            ])
            ->addSelect('service_icon', [
                'label' => 'Service Icon',
                'choices' => ['achievement', 'ask-for-help', 'asking', 'atom', 'award', 'brain', 'brain-1', 'browser', 'bulb', 'bulb-1', 'business-meeting', 'cards', 'certificate', 'chart', 'checklist', 'clipboard',
                    'code', 'colours', 'computer', 'computer-1', 'configuration', 'connection', 'content', 'creative', 'design', 'designer', 'document', 'followers', 'goals', 'guarantee', 'keyword', 'language',
                    'likes', 'link', 'location', 'marketing', 'marketing-1', 'mentoring', 'networking', 'pallete', 'rating', 'research', 'review', 'review-1', 'review-2', 'search-engine', 'search-engine-1', 'search-engine-2',
                    'seo', 'seo-1', 'seo-2', 'seo-3', 'seo-4', 'skills', 'strategy', 'tips', 'training', 'webdesign', 'webpage', 'webpage-1', 'webpage-2', 'website', 'website-1', 'writer'],
                'default_value' => [],
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'value',
            ]);

        return $service->build();
    }
}
