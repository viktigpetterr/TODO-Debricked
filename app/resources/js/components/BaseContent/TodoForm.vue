<template>
    <div class="add-todo-wrapper">
        <q-input
            class="todo-input"
            v-model="text"
            label="To do"
            style="width: 100%; font-size: var(--content-font-size);"
            @keyup.enter="addTodo"
        >
            <template v-slot:prepend>
                <i class="material-icons" style="font-size: var(--content-font-size); color: var(--vue-blue);">assignment</i>
            </template>
        </q-input>
        <q-btn
            class="add-todo-button"
            :disable="text.length === 0"
            style="background: var(--vue-green); color: var(--vue-blue); margin-left: 10%; width: 70px; border-radius: 30px;"
            label="+"
            @click="addTodo"
        />
    </div>
</template>

<script>
export default {
    name: "TodoForm",
    data () {
        return {
            text: ""
        }
    },
    methods: {
        addTodo () {
            if (this.text !== "") {
                this.$emit('addTodo', this.text)
                this.text = ""
            }
        }
    }
}
</script>

<style>
     .add-todo-wrapper {
         display: flex;
         justify-content: space-between
     }
     .todo-input .q-field__control {
         color: var(--vue-green) !important;
     }
     .q-checkbox__bg {
         border-radius: 10px !important;
     }
     .add-todo-button .q-btn__content {
         font-size: 40px !important;
     }
</style>
