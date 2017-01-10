<template>
    <div class="panel panel-default">
        <div class="panel-heading">Menu Component</div>
        <div class="panel-body">
            <ul class="list-group">
                 <li v-for="pizza in menu.pizza_list" class="list-group-item">
                  {{pizza.name}} <span class="badge">Select</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                menu : {
                    pizza_list : [],
                    toppings_list : []
                }
            }
        },
        methods : {
            pizzas() {
                var vm = this;
                console.log('pizzas ready.');
                Vue.http.get('/api/pizzas').then((response) => {
                                        // success callback
                                        vm.menu.pizza_list=response.data;
                                      }, (response) => {
                                        // error callback
                                      });
            }
        },
        ready() {
            this.pizzas();
        }
    }
</script>
