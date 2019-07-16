<div class="row col-lg-12 reply-editor-box">
    <form id="reply-form" action="#" method="get" accept-charset="utf-8">
        <input type="hidden" name="idComment" value="{{ $idComment }}">
        <input type="hidden" name="idPost" value="{{ $idPost }}">
        <div class="col-lg-2">
            <img class="img-responsive" src="{{ asset(config('define.avatar_default')) }}">
        </div>
        <div class="col-lg-10 pd-0">
            <textarea class="form-control reply-editor" wrap="false" name="contents" spellcheck="false" placeholder="{{ __('page.comment.write_comment') }}"></textarea>
        </div>
    </form>
</div>
