class CreateRechargeFormController{
    constructor(API, ToastService, DialogService){
        'ngInject';

        this.API = API;
        this.ToastService = ToastService;
        this.DialogService = DialogService;
    }

    $onInit(){
        this.value = 0;
        this.recharges = [];
    }

    submit(){
        this.DialogService.confirm('Confirmar Recarga', `La recarga se hará al número ${this.phone_number} por un valor de ${ this.value }.`).then(() => {
            var data = {
              phone_number: this.phone_number,
              value: this.value
            };
            
            this.API.all('recharges').post(data).then((response) => {
                this.ToastService.show('Recarga hecha correctamente');
                this.recharges.push({ phone_number: this.phone_number, value: this.value });
                this.phone_number = '';
                this.value = 0;
            });
        });
    }
}

export const CreateRechargeFormComponent = {
    templateUrl: './views/app/components/create_recharge_form/create_recharge_form.component.html',
    controller: CreateRechargeFormController,
    controllerAs: 'vm',
    bindings: {}
}
