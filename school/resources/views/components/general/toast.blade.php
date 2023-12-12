<div>
    <div class="append-alerts">

    </div>
</div>
@push(AppConst::PUSH_JS)
    <script>
        window.addEventListener('notify', event => {
            let param = event.detail;
            console.log({param})
            let icons = {
                info: 'fa-info-circle',
                success: 'fa-check-circle',
                danger: 'fa-times-circle',
                error: 'fa-times-circle',
                warning: "fa-exclamation-circle"
            };
            let clases = "toast-danger toast-success toast-warning toast-info";
            let html = `<div class="toast toast-${param['type'] == 'error' ? 'danger' : param['type']}" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto">${param['title'] || param['type']}</strong>
<!--    <small>11 mins ago</small>-->
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    ${param['message']}
  </div>
</div>`;
            $('.append-alerts').append(html);
            $('.toast').toast('show');
            $(document).ready(function () {
                $('.toast').on('hide.bs.toast', function () {
                    $(this).remove();
                })
            })
        });
        window.livewire.on('notify', param => {
            let icons = {
                info: 'fa-info-circle',
                success: 'fa-check-circle',
                danger: 'fa-times-circle',
                error: 'fa-times-circle',
                warning: "fa-exclamation-circle"
            };
            let clases = "toast-danger toast-success toast-warning toast-info";
            let html = `
        <div id="liveToast" class="toast hide toast-${param['type'] == 'error' ? 'danger' : param['type']} mt-2" role="alert"  aria-live="assertive" aria-atomic="true">
            <div class="toast-body d-flex">
                <div class="w-20 d-flex toast-icon" style="justify-content: center;align-items: center;">
                    <i aria-hidden="true" class="fa-3x fas ${icons[param['type']]}"></i>
                </div>
                <div class="pl-3 w-70 px-2">
                    <strong class="me-auto toast-title">${param['title'] || param['type']}</strong>
                    <p class="toast-message">${param['message']}</p>
                </div>
                <div class="w-10">
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    `;
            $('.append-alerts').append(html);
            $('.toast').toast('show');
            $(document).ready(function () {
                $('.toast').on('hide.bs.toast', function () {
                    $(this).remove();
                })
            })
        });
    </script>
@endpush
