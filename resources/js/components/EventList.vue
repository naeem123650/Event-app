<template>
    <div class="events-container">
        <router-link :to="{ name: 'EventCreate' }">Create an Event</router-link>
        <h2 class="event-title">Events ( count: {{ eventList.total }})</h2>
        <div class="event-section" v-if="eventList">
            <div
                class="events-list"
                v-for="(event, index) in eventList.data"
                :key="index"
            >
                <div class="title">{{ event.title }}</div>
                <p class="description">{{ event.description }}</p>
                <p class="author">{{ event.author }}</p>
                <p class="createdat">{{ event.created_at }}</p>
                <RouterLink
                    class="btn"
                    :to="{ name: 'EventView', params: { id: event.id } }"
                    >View Event</RouterLink
                >
            </div>
        </div>
        <div class="loader" v-if="showLoader">Loading....</div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import axios from "axios";
import "./styles.scss";

export default defineComponent({
    data() {
        return {
            eventList: [],
            showLoader: false,
        };
    },
    mounted() {
        this.showLoader = true;
        axios
            .get("/api/events")
            .then((response) => {
                if (response?.data?.success) {
                    this.eventList = response.data.data;
                    this.showLoader = false;
                }
            })
            .catch((err) => {
                console.error(err);
            });
    },
});
</script>

<style scoped>
.event-title {
    text-align: center;
}

.event-section {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 200px;
}

@media (max-width: 768px) {
    .event-section {
        flex-direction: column;
        gap: 50px;
    }
}

.loader {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
