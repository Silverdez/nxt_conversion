<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Roots\Acorn\Application;
use StoutLogic\AcfBuilder\FieldsBuilder;

class SectionServices extends Block
{
    public function __construct(Application $app)
    {
        /**
         * The block name.
         *
         * @var string
         */
        $this->name = __('Section Services', 'sage');

        /**
         * The block slug.
         *
         * @var string
         */
        $this->slug = 'section-services';

        /**
         * The block description.
         *
         * @var string
         */
        $this->description = __('Section Services block.', 'sage');

        /**
         * The block category.
         *
         * @var string
         */
        $this->category = 'formatting';

        /**
         * The block icon.
         *
         * @var string|array
         */
        $this->icon = 'editor-ul';

        /**
         * The block keywords.
         *
         * @var array
         */
        $this->keywords = [];

        /**
         * The block post type allow list.
         *
         * @var array
         */
        $this->post_types = [];

        /**
         * The parent block type allow list.
         *
         * @var array
         */
        $this->parent = [];

        /**
         * The default block mode.
         *
         * @var string
         */
        $this->mode = 'preview';

        /**
         * The default block alignment.
         *
         * @var string
         */
        $this->align = '';

        /**
         * The default block text alignment.
         *
         * @var string
         */
        $this->align_text = '';

        /**
         * The default block content alignment.
         *
         * @var string
         */
        $this->align_content = '';

        /**
         * The supported block features.
         *
         * @var array
         */
        $this->supports = [
            'align' => true,
            'align_text' => false,
            'align_content' => false,
            'full_height' => false,
            'anchor' => false,
            'mode' => false,
            'multiple' => true,
            'jsx' => true,
        ];

        /**
         * The block preview example data.
         *
         * @var array
         */
        $this->example = [
           'items' => [
               ['item' => 'Item one'],
               ['item' => 'Item two'],
               ['item' => 'Item three'],
           ],
        ];

        parent::__construct($app);
    }

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'items' => $this->items(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $sectionServices = new FieldsBuilder('section_services');

        $sectionServices
            ->addText('title_services', [
                'label' => 'Title Section Services',
                'instructions' => 'H2 Title of the section service',
                'required' => 0,
            ])
            ->addTextarea('description_services', [
                'label' => 'Description Section Services',
                'instructions' => 'Description of the section service',
                'required' => 0,
            ])
            ->addRelationship('section_services', [
                'label' => 'Service to chose',
                'instructions' => 'you can select and rearrange the list',
                'required' => 0,
                'conditional_logic' => [],
                'post_type' => ['service'],
                'filters' => [
                    0 => 'search',
                ],
                'return_format' => 'object',
            ]);

        return $sectionServices->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function items()
    {
        return get_field('items') ?: $this->example['items'];
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
