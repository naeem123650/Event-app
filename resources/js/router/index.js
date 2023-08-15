import { createRouter, createWebHistory } from "vue-router";
import EventList from "@/components/EventList.vue";
import EventView from "@/components/EventView.vue";
import Create from "@/components/Create.vue";

const routes = [
    {
        name: "EventList",
        path: "/",
        component: EventList,
    },
    {
        name: "EventView",
        path: "/event/:id",
        component: EventView,
        props: true,
    },
    {
        name: "EventCreate",
        path: "/event/create",
        component: Create,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
