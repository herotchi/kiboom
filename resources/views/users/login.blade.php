<div class="modal{{ $errors->has('login_id') || $errors->has('password') ? '' : ' fade' }}" id="usersLogin" data-bs-backdrop="static" data-bs-focus="true" data-bs-keyboard="false" tabindex="-1" aria-labelledby="usersEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="usersLoginLabel">ログイン情報変更</h1>
            </div>
            <div class="modal-body">
            <form action="{{ route('users.login_update') }}" method="post" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="login_id" class="form-label">ログインID
                            <span class="text-danger font-weight-bold">※</span>
                        </label>
                        <input type="text" id="login_id" 
                            class="form-control{{ $errors->has('login_id') ? ' is-invalid' : '' }}" 
                            name="login_id" value="{{ old('login_id', Auth::user()->login_id) }}" placeholder="ログインID" 
                            required autofocus>
                        <div class="invalid-feedback">{{ $errors->first('login_id') }}</div>
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">パスワード</label>
                        <input type="password" id="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                            name="password">
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    </div>
                    <div class="col-md-12">
                        <label for="password_confirmation" class="form-label">パスワード確認</label>
                        <input type="password" id="password_confirmation"
                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" 
                            name="password_confirmation">
                        <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-12 text-center">
                    <button class="btn btn-primary w-50" type="submit">更新する</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->has('login_id') || $errors->has('password'))
<script>
    // 入力エラーがあった場合、モーダルを表示したままにする
    $(window).on('load',function(){
        $('#usersLogin').modal('show');
    });
</script>
@endif
<script>
    var modalUsersLoginEl = document.getElementById('usersLogin');

    // モーダルが完全に非表示になった時
    modalUsersLoginEl.addEventListener('hidden.bs.modal', event => {
        // fade演出を復活させる
        modalUsersLoginEl.classList.add('fade');
        // 入力エラーの演出を取り除く
        // ログインID
        var inputLoginIdEl = document.getElementById('login_id');
        inputLoginIdEl.classList.remove('is-invalid');
        inputLoginIdEl.value = '{{Auth::user()->login_id}}';
        // パスワード
        var inputPasswordEl = document.getElementById('password');
        inputPasswordEl.classList.remove('is-invalid');
        inputPasswordEl.value = '';
        // パスワード確認
        var inputPasswordConfEl = document.getElementById('password_confirmation');
        inputPasswordConfEl.classList.remove('is-invalid');
        inputPasswordConfEl.value = '';
    });

    // モーダルが完全に表示されたとき
    modalUsersLoginEl.addEventListener('shown.bs.modal', event => {
        // fade演出を復活させる
        modalUsersLoginEl.classList.add('fade');
    });
</script>