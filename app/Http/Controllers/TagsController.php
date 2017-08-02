<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Lesson;
use Illuminate\Http\Request;
use Acme\Transformers\TagTransformer;
use App\Http\Controllers\ApiController;

class TagsController extends ApiController
{
    /*
    * @var Acme\Transformers\TagTransformer
    */
    protected $tagTransformer;

    function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }

    /**
     * Description
     * @param type|null $lessonId 
     * @return Response
     */
    public function index($lessonId = null)
    {
        $tags = $this->getTags($lessonId);

        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->all())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getTags($lessonId)
    {
        $tags = $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();

        return $tags;
    }

}
