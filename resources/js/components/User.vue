<template>
  <div class="text-center my-3">
    <h1 class="text-uppercase">Hello World!</h1>
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th>รหัส</th>
          <th>ชื่อ</th>
          <th>จังหวัด</th>
          <th>แก้ไข</th>
          <th>ลบ</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.city }}</td>
          <td><a href="#" class="btn btn-warning">Edit</a></td>
          <td><a href="#" class="btn btn-danger">Delete</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  mounted() {
    this.geteUserData();
  },
  methods: {
    geteUserData() {
      axios
        .get("/api/users")
        .then((response) => {
          this.users = response.data;
        })
        .catch((errors) => {
          console.log(errors);
        });
    },
  },
  data() {
    return {
      users: [],
      user: {
        id: 0,
        name: "",
        city: "",
      },
    };
  },
};
</script>