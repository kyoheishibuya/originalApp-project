@include('layouts.header')



<div class="container">
    <form method="post" action="{{ route('item_ad.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 md-5">
                <img id="previewImage" class="card-img-top" alt="No Image">
                <input type="file" name="image_name" onchange="previewFile()">
            </div>
        </div>



            <div class="col">
                <div class="mb-3 col">
                    <label for="title" class="form-label">商品名1</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="mb-3 col">
                    <label for="description" class="form-label">概要</label>
                    <input type="text" class="form-control" name="description" >
                </div>
                <div class="mb-3 col">
                    <label for="price" class="form-label">価格</label>
                    <input type="text" class="form-control" name="price"  >
                </div>
                <div class="col-md-12 py-3">
                    <button type="submit" class="btn btn-success" >登録</button>
                </div>
            </div>

        </div>
    </form>
</div>
<script>
    function previewFile() {
        var preview = document.getElementById('previewImage');
        var fileInput = document.querySelector('input[type=file]');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
</div>


{{--@auth--}}

{{--    <p>--}}
{{--        {{ Auth::user()->name }}さん、こんにちは--}}
{{--    </p>--}}

{{--@endauth--}}

@include('layouts.footer')
