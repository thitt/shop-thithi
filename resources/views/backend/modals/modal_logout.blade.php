<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('layout.confirm_logout') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('message.auth.logout') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('layout.button.close') }}</button>
                <a href="{{ route(ROUTE_ADMIN_LOGOUT) }}">
                    <button type="button" class="btn btn-danger">{{ __('layout.auth.logout') }}</button>
                </a>
            </div>
        </div>
    </div>
</div>
