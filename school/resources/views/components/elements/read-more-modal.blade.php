@props(['title'=>'Details'])
<div>
    <div class="modal fade" id="read-more-modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang($title)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="w-100">
                    <div class="card-body pt-0">
                        <div class="paragraph-style2 blue" id="read-full-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push(AppConst::PUSH_JS)
        <script>
            function openReadMoreModal(content) {
                // console.log({content})
                $('#read-full-content').html(content)
                var myModal = new bootstrap.Modal(document.getElementById('read-more-modal'));
                myModal.show();
            }
        </script>
    @endpush
</div>
