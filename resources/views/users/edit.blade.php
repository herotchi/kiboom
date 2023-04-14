<div class="modal{{ $errors->has('name') ? '' : ' fade' }}" id="usersEdit" data-bs-backdrop="static" data-bs-focus="true" data-bs-keyboard="false" tabindex="-1" aria-labelledby="usersEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('users.update') }}" method="post" novalidate>
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="usersEditLabel">ユーザー名変更</h1>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="login_id" class="form-label">ユーザー名
                                <span class="text-danger font-weight-bold">※</span>
                            </label>
                            <input type="text" id="name" 
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="ユーザー名" 
                                required autofocus>
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary w-50" type="submit">更新する</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($errors->has('name'))
<script>
    // 入力エラーがあった場合、モーダルを表示したままにする
    $(window).on('load',function(){
        $('#usersEdit').modal('show');
    });
</script>
@endif
<script>
    var modalUserEditEl = document.getElementById('usersEdit');

    // モーダルが完全に非表示になった時
    modalUserEditEl.addEventListener('hidden.bs.modal', event => {
        // fade演出を復活させる
        modalUserEditEl.classList.add('fade');
        // 入力エラーの演出を取り除く
        var inputNameEl = document.getElementById('name');
        inputNameEl.classList.remove('is-invalid');
        inputNameEl.value = '{{Auth::user()->name}}';
    });

    // モーダルが完全に表示されたとき
    modalUserEditEl.addEventListener('shown.bs.modal', event => {
        // fade演出を復活させる
        modalUserEditEl.classList.add('fade');
    });
</script>