<?php
namespace Acme\Transformers;

class TagTransformer extends Transformer {

	/**
	 * customisez data
	 * @param type $tag 
	 * @return array
	 */
	public function transform($tag)
    {
        return [
            'name' => $tag['name']
        ];
    }
}