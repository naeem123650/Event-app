<template>
    <div class="form-container">
        <form @submit.prevent="createEvent">
            <h2>Create an Event</h2>
            <div class="form-group">
                <label for="title">Title :</label>
                <input
                    type="text"
                    v-model="formData.title"
                    placeholder="Please Enter Title"
                    id="title"
                />
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea
                    v-model="formData.description"
                    placeholder="Please Enter Description"
                    id="description"
                />
            </div>
            <div class="form-group">
                <label for="author">Author :</label>
                <input
                    type="text"
                    v-model="formData.author"
                    placeholder="Please Enter author"
                    id="author"
                />
            </div>
            <div class="form-group">
                <label for="status">Status :</label>
                <input
                    type="checkbox"
                    v-model="formData.status"
                    placeholder="Please Enter status"
                    id="status"
                    :value="formData.status"
                    :checked="formData.status"
                />
            </div>
            <div class="form-group">
                <button type="submit">Create Event</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";
import { defineComponent } from "vue";

export default defineComponent({
    data() {
        return {
            formData: {
                title: "",
                description: "",
                author: "",
                status: false,
            },
        };
    },
    methods: {
        createEvent() {
            axios
                .post("/api/events", this.formData)
                .then((res) => {
                    console.log(res.data);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
});
</script>

<style scoped>
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    position: absolute;
    top: 10%;
    left: 35%;
}
.form-group {
    padding-top: 20px;
}
</style>
