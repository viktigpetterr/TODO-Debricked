<template>
    <div class="categories-wrapper">
        <q-separator spaced inset color="white"/>
        <q-list dense padding class="rounded-borders">
            <category
                v-for="(category, index) in categories"
                v-bind:key="category.id"
                :category="category"
                :index="index"
            />
            <category-input :show="showCategoryInput" @addCategory="addCategory"/>
            <q-item>
                <q-item-section style="align-content: center;">
                    <q-btn
                        class="add-category-button"
                        style="background: white; color: var(--vue-blue); margin-top: 1%; width: 40px; height: 40px; border-radius: 30px;"
                        label="+"
                        @click="showCategoryInput = true"
                    />
                </q-item-section>
            </q-item>
        </q-list>
    </div>
</template>

<script>
import Category from "./Categories/Category";
import CategoryInput from "./Categories/CategoryInput";

export default {
    name: "Categories",
    components: {
        CategoryInput,
        Category
    },
    mounted() {
        this.$api
            .get("categories")
            .then(response => this.categories = response.data)
            .catch(error => console.log(error))
    },
    data() {
        return {
            showCategoryInput: false,
            categories: []
        }
    },
    methods: {
        addCategory(text) {
            if (text !== "") {
                this.categories.push({name: text, numberOfTodos: 0})
                this.$api
                    .post("categories", { name: text })
                    .then(response => this.categories[this.categories.length - 1].id = response.data.id)
                    .catch(error => {
                        this.$delete(this.categories, this.categories.length - 1)
                        console.log(error)
                    })
            }
            this.showCategoryInput = false;
        },
    }
}
</script>

<style>
.categories-wrapper {
    font-size: 1.5rem;
    color: white;
    margin-left: 5%;
    margin-right: 20%;
    margin-top: 10%;
}

.add-category-button .q-btn__content {
    align-content: center;
    font-size: 40px !important;
}
</style>
