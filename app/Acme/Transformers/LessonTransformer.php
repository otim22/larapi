<?php
namespace Acme\Transformers;

class LessonTransformer extends Transformer {

	/**
	 * customisez data
	 * @param type $lesson 
	 * @return array
	 */
	public function transform($lesson)
    {
        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'active' => (boolean) $lesson['some_bool']
        ];
    }
}