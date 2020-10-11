<template>
    <div v-if="show" class="category-input-wrapper">
        <q-item>
            <q-item-section avatar style="font-size: 2rem;">
                <i class="material-icons">list</i>
            </q-item-section>
            <q-item-section style="color: white;">
                <q-input
                    class="category-input"
                    v-model="text"
                    :dense="true"
                    style="width: 100%; font-size: var(--content-font-size);"
                    autofocus
                    @keyup.enter="addCategory"
                    @blur="addCategory"
                />
            </q-item-section>
            <q-item-section side style="color: white;">
                0
            </q-item-section>
        </q-item>
    </div>
</template>

<script>
export default {
    name: "CategoryInput",
    props: {
        show: Boolean
    },
    data () {
        return {
            text: "",
        }
    },
    methods: {
        addCategory () {
            this.$emit('addCategory', this.text)
            this.text = ""
        }
    }
}
</script>

<style>
    .category-input .q-field__control {
        color: white !important;
        font-size: var(--sidebar-font-size);
    }

    .category-input .q-field__native {
        color: white !important;
    }
</style>
