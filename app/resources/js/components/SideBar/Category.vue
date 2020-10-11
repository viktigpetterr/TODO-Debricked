<template>
    <div class="category-wrapper">
        <q-item clickable v-ripple :active="false" @click="$store.commit('changeCategory', category)">
            <q-item-section avatar style="font-size: var(--sidebar-icon-size);">
                <i class="material-icons">list</i>
            </q-item-section>
            <q-item-section>{{ category.name }}</q-item-section>
            <q-item-section side style="color: white;">
                {{ category.numberOfTodos }}
            </q-item-section>
        </q-item>
    </div>

</template>

<script>
export default {
    name: "Category",
    props: {
        category: Object,
        index: Number
    },
}
</script>

<style scoped>
    .category-wrapper {
        color: white;
        font-size: var(--sidebar-font-size);
    }
</style>
