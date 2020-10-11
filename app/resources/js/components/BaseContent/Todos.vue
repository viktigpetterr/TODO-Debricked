<template>
    <div class="list-wrapper">
        <todo-form class="todo-form" @addTodo="addTodo"/>
        <q-list bordered separator>
            <todo
                v-for="(todo, index) in todos"
                v-bind:key="todo.id"
                :todo="todo"
                :index="index"
                @deleteTodo="deleteTodo"
                @todoDone="todoDone"
            />
        </q-list>
    </div>
</template>

<script>
import Todo from "./Todo";
import TodoForm from "./TodoForm";

export default {
    name: "Todos",
    components: {
        Todo,
        TodoForm
    },
    mounted() {
        this.fetchTodos()
    },
    data() {
        return {
            todos: []
        }
    },
    computed: {
        categoryId() {
            return this.$store.getters.categoryId
        }
    },
    methods: {
        fetchTodos() {
            this.$api
                .get("todos/" + this.categoryId)
                .then(response => this.todos = response.data)
                .catch(error => console.log(error))
        },
        deleteTodo(index) {
            const url = "todos/delete/" + this.categoryId + "/" + this.todos[index].id
            this.$api
                .post(url)
                .then(response => { this.$delete(this.todos, index) })
                .catch(error => console.log(error))
        },
        addTodo (text) {
            this.todos.push({ done: 0, text: text })
            this.$api
                .post("todos/" + this.categoryId, { text: text })
                .then(response => { this.todos[this.todos.length - 1].id = response.data.id })
                .catch(error => {
                    this.$delete(this.todos, this.todos.length - 1)
                    console.log(error)
                })
        },
        todoDone (index) {
            const url = "todos/done/" + this.categoryId + "/" + this.todos[index].id
            this.$api
                .post(url)
                .catch(error => {
                    this.todos[index].done = !this.todos[index].done
                    console.log(error)
                })
        }
    },
    watch: {
        categoryId() {
            this.fetchTodos()
        }
    }

}
</script>

<style scoped>

.todo-form {
    margin-bottom: 5%;
}
</style>
