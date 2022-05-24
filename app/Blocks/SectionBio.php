<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Roots\Acorn\Application;
use StoutLogic\AcfBuilder\FieldsBuilder;

class SectionBio extends Block
{
    public function __construct(Application $app)
    {
        /**
         * The block name.
         *
         * @var string
         */
        $this->name = __('Section Bio', 'sage');

        /**
         * The block slug.
         *
         * @var string
         */
        $this->slug = 'section-bio';

        /**
         * The block description.
         *
         * @var string
         */
        $this->description = __('Section Bio block.', 'sage');

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
        $sectionBio = new FieldsBuilder('section_bio');

        $sectionBio
            ->addText('title_bio', [
                'label' => 'Title Section Bio',
                'instructions' => 'H2 Title of the section bio',
                'required' => 0,
            ])
            ->addTextarea('description_bio', [
                'label' => 'Description Section Bio',
                'instructions' => 'Description of the section bio',
                'required' => 0,
            ])
            ->addText('biography_name', [
                'label' => 'Biography Name',
                'instructions' => 'H4 Title of the testimonial',
                'required' => 1,
            ])
            ->addText('biography_position', [
                'label' => 'Biography Position Job',
                'instructions' => 'Position Job of the testimonial',
                'required' => 0,
            ])
            ->addTextarea('biography_description', [
                'label' => 'Biography Description',
                'instructions' => 'Description inside the biography section',
                'required' => 1,
            ])
            ->addImage('biography_avatar', [
                'label' => 'Biography Avatar',
            ]);

        return $sectionBio->build();
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
