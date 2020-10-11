<template>
    <div class="app-wrapper">
        <side-bar/>
        <base-content/>
    </div>
</template>

<script>
import BaseContent from './components/BaseContent/BaseContent.vue'
import SideBar from "./components/SideBar/SideBar.vue";

export default {
  name: 'app',

  components: {
    SideBar,
    BaseContent,
  },
}
</script>

<style scoped>
    .app-wrapper {
        display: flex;
    }
</style>
