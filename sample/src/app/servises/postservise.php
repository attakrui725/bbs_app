<?php
class PostService {
    public function check_permission()
    {
      if(!(\Auth::user()->can('admin') || \Auth::user()->id == $post->user_id)) {
        abort(403);
    }
}
