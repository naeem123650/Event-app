<template>
    <div>
        <h2 class="event-title">Event</h2>
        <div class="event-section" v-if="event">
            <div class="title">{{ event.title }}</div>
            <p class="description">{{ event.description }}</p>
            <p class="author">{{ event.author }}</p>
            <p class="createdat">{{ event.created_at }}</p>
        </div>
        <div class="loader" v-if="showLoader">Loading....</div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import axios from "axios";

export default defineComponent({
    props: ["id"],
    data() {
        return {
            event: [],
            showLoader: false,
        };
    },
    mounted() {
        this.showLoader = true;
        axios
            .get(`/api/events/${this.id}`)
            .then((res) => {
                this.event = res.data.data;
                this.showLoader = false;
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
    flex-direction: column;
}

.loader {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
