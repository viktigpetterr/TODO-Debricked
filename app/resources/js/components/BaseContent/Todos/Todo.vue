<template>
    <q-item clickable v-ripple :active="false">
        <q-item-section avatar>
            <q-checkbox
                v-model="todo.done"
                :true-value="1"
                :false-value="0"
                color="green"
                @input="$emit('todoDone', index)"
            />
        </q-item-section>
        <q-item-section :style="todo.done ? 'text-decoration: line-through;' : ''">{{ todo.text }}</q-item-section>
        <q-item-section side>
            <q-btn round flat style="color: var(--vue-blue);" icon="delete" @click="$emit('deleteTodo', index)"/>
        </q-item-section>
    </q-item>
</template>

<script>
export default {
    name: "Todo",
    props: {
        todo: Object,
        index: Number
    },
    data () {
        return {
            check: false
        }
    }
}
</script>

<style>
    .q-checkbox__bg {
        border-radius: 10px;
    }
</style>
