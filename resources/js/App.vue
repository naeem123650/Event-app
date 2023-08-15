<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import EventList from "./components/EventList.vue";

export default defineComponent({
    data() {
        return {};
    },
    component: {
        EventList,
    },
    components: { EventList },
});
</script>
