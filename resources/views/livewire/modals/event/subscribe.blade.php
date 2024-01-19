
<x-modals-modal wire:model="show">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('subscribe')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if($event->isSubscribed())
                <div class="alert alert-success" role="alert">
                    {{__('you are subscribed to this event')}}
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    {{__('you are not subscribed to this event')}}
                </div>
            @endif
            <div class="form-group">
                <label for="exampleFormControlSelect1">{{__('status')}}</label>
                <select class="form-control" id="exampleFormControlSelect1" wire:model="status">
                    <option value="1">{{__('subscribed')}}</option>
                    <option value="0">{{__('not subscribed')}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">{{__('payment status')}}</label>
                <select class="form-control" id="exampleFormControlSelect1" wire:model="payment_status">
                    <option value="1">{{__('paid')}}</option>
                    <option value="0">{{__('not paid')}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">{{__('payment method')}}</label>
                <select class="form-control" id="exampleFormControlSelect1" wire:model="payment_method">
                    <option value="1">{{__('cash')}}</option>
                    <option value="2">{{__('credit card')}}</option>
                    <option value="3">{{__('bank transfer')}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">{{__('payment amount')}}</label>
                <input type="number" class="form-control" id="exampleFormControlSelect1" wire:model="payment_amount">
            </div>
        </div>

</div>
</x-modals-modal>
