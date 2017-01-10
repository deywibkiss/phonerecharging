class CreateIntakeFormController{
    constructor(API, ToastService, DialogService){
        'ngInject';

        this.API = API;
        this.ToastService = ToastService;
        this.DialogService = DialogService;
    }

    $onInit(){

        this.secs = 0;
        this.intakes = [];
    }

    submit(){
        this.DialogService.confirm('Confirmar Consumo', `El consumo se hará al número ${this.phone_number} por ${ this.secs } segundos.`).then(() => {
            var data = {
              phone_number: this.phone_number,
              secs: this.secs
            };
            
            this.API.all('intakes').post(data).then((response) => {
                console.log(response);
                this.ToastService.show('Consumo hecho correctamente');
                this.intakes.push({
                    phone_number: this.phone_number,
                    secs: this.secs
                });
                this.phone_number = '';
                this.secs = 0;
            }, (error) =>{
                this.ToastService.error(error.data.errors.message[0]);
            });
        });
    }
}

export const CreateIntakeFormComponent = {
    templateUrl: './views/app/components/create_intake_form/create_intake_form.component.html',
    controller: CreateIntakeFormController,
    controllerAs: 'vm',
    bindings: {}
}
