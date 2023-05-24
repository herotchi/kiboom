<!-- モーダルの設定 -->
<div class="modal fade" id="privacy_policy_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="privacy_policy_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h2 class="modal-title" id="privacy_policy_modal">利用規約</h2>
            </div>
            <div class="modal-body">
                @include('layouts.privacy_policy_block')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#privacy_policy_modal">閉じる</button>
            </div>
        </div>
    </div>
</div>