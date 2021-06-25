<template>
  <div class="card box-card-shadow">
    <div class="card-header bg-dark text-white">Create User</div>
    <div class="card-body">
      <form action="/users">
        <input
          class="form-control mb-3"
          type="text"
          name="name"
          placeholder="Enter Name"
          required
          v-model="name"
        />
        <input
          class="form-control mb-3"
          type="text"
          name="city"
          placeholder="Enter Cty"
          required
          v-model="city"
        />
        <button class="btn btn-primary" type="submit" @click="addNewUser()">
          Submit
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      city: "",
    };
  },
  methods: {
    addNewUser() {
      axios.post("/api/users", {
        name: this.name,
        city: this.city,
      });
    },
  },
};
</script>

<style>
</style>