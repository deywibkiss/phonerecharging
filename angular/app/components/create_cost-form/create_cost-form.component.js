class CreateCostFormController{
    constructor(API, ToastService){
        'ngInject';

        this.API = API;
        this.ToastService = ToastService;
    }

    $onInit(){
        this.price = 0;
        this.id = null;
        this.get();
    }


    get(){
      this.API.one('costs').get().then((response) => {
          this.id = response.data.cost.id;
          this.price = response.data.cost.price;
      }, (err) =>{
        this.ToastService.error(err.data.errors.message[0]);
      });
    }

    submit(){
      var data = {
        id: this.id,
        price: this.price
      };
      
       this.API.all('costs').post(data).then((response) => {
         this.ToastService.show('Costo actualizado correctamente');
       });
    }
}

export const CreateCostFormComponent = {
    templateUrl: './views/app/components/create_cost-form/create_cost-form.component.html',
    controller: CreateCostFormController,
    controllerAs: 'vm',
    bindings: {}
}
