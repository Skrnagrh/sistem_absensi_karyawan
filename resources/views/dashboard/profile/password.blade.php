<form action="/password" method="POST">
    <div class="modal fade" id="editpassword" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kata Sandi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label>Kata Sandi Lama</label>
                        <div class="input-group">
                            <input class="form-control" type="password" name="old_password"
                                placeholder="Kata Sandi Lama" />
                            <button type="button" class="btn btn-outline-primary" id="toggleOldPassword">
                                <i class="bi bi-eye" id="oldPasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Kata Sandi Baru</label>
                        <div class="input-group">
                            <input class="form-control" type="password" name="new_password"
                                placeholder="Kata Sandi Baru" />
                            <button type="button" class="btn btn-outline-primary" id="toggleNewPassword">
                                <i class="bi bi-eye" id="newPasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Konfirmasi Kata Sandi Baru</label>
                        <div class="input-group">
                            <input class="form-control" type="password" name="new_password_confirmation"
                                placeholder="Konfirmasi Kata Sandi Baru" />
                            <button type="button" class="btn btn-outline-primary" id="toggleConfirmationPassword">
                                <i class="bi bi-eye" id="confirmationPasswordIcon"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>


<script>
    const togglePassword = (passwordInput, passwordIcon) => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('bi-eye');
            passwordIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('bi-eye-slash');
            passwordIcon.classList.add('bi-eye');
        }
    };

    const oldPasswordInput = document.getElementsByName('old_password')[0];
    const oldPasswordIcon = document.getElementById('oldPasswordIcon');
    const toggleOldPasswordButton = document.getElementById('toggleOldPassword');
    toggleOldPasswordButton.addEventListener('click', () => togglePassword(oldPasswordInput, oldPasswordIcon));

    const newPasswordInput = document.getElementsByName('new_password')[0];
    const newPasswordIcon = document.getElementById('newPasswordIcon');
    const toggleNewPasswordButton = document.getElementById('toggleNewPassword');
    toggleNewPasswordButton.addEventListener('click', () => togglePassword(newPasswordInput, newPasswordIcon));

    const confirmationPasswordInput = document.getElementsByName('new_password_confirmation')[0];
    const confirmationPasswordIcon = document.getElementById('confirmationPasswordIcon');
    const toggleConfirmationPasswordButton = document.getElementById('toggleConfirmationPassword');
    toggleConfirmationPasswordButton.addEventListener('click', () => togglePassword(confirmationPasswordInput, confirmationPasswordIcon));
</script>
