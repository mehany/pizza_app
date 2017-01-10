<template>
    <div class="panel panel-default">
        <div class="panel-heading">Toppings List <span class="badge">({{toppings_list.length}})</span></div>

        <div class="panel-body">
           <ul class="list-group toppings_list">
                <li v-for="topping in toppings_list" class="list-group-item">
                 {{topping.name}}
                 <button class="badge" @click="addToPizza(topping.name)">Add </button>
               </li>
           </ul>
           <span>Create a new topping</span>
           <div class="input-group">
                 <input type="text" class="form-control" v-model="newTopping" placeholder="Search for...">
                 <span class="input-group-btn">
                   <button class="btn btn-default" @click="add(newTopping)" type="button">Save!</button>
                 </span>
           </div><!-- /input-group -->
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
               newTopping : '',
               toppings_list : []
            }
        },
        methods : {
            toppings() {
                var vm = this;
                Vue.http.get('/api/toppings').then((response) => {
                                        // success callback
                                        vm.toppings_list=response.data;
                                      }, (response) => {
                                        // error callback
                                      });
            },
            add(name) {
                var vm = this;
                Vue.http.post('/api/toppings', { 'topping' : { "name" : name}}).then((response) => {
                                                    // success callback
                                                    vm.toppings();
                                                  }, (response) => {
                                                    // error callback
                                                  });
            },
            addToPizza(className) {
                className=className.toLowerCase();
                className=className.replace(' ', '-');
                $('.'+className).each(function(){
                    $(this).toggleClass('added');
                });
            }
        },
        ready() {
            this.toppings();
        }
    }
</script>
