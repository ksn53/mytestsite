    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod.</p>
      </div>

      <div class="p-4">
          <h4 class="font-italic">теги</h4>
          @include('content.tags', ['tags' => $tagsCloud])
      </div>
    </aside><!-- /.blog-sidebar -->