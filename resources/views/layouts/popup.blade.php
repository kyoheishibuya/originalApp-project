@if (session('success'))
    <!-- ポップアップ表示用のモーダル -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">成功メッセージ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>

    <!-- モーダル表示用のスクリプト -->
    <script>
        $(document).ready(function(){
            // 現在のスクロール位置を保存
            var currentPosition = $(window).scrollTop();

            $('#successModal').modal('show'); // ページ読み込み時にモーダルを表示

            // モーダルが閉じられた後にスクロール位置を元に戻す
            $('#successModal').on('hidden.bs.modal', function () {
                $(window).scrollTop(currentPosition);
            });

            // 3秒後にモーダルを自動的に閉じる
            setTimeout(function(){
                $('#successModal').modal('hide');
            }, 3000); // 3000ミリ秒 = 3秒
        });
    </script>
@endif

