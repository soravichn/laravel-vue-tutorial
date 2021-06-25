<template>
  <div>
    <table class="table table-bordered">
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
        <tr v-for="(user, index) in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.city }}</td>
          <td>
            <button
              data-toggle="modal"
              data-backdrop="static"
              data-keyboard="false"
              data-target="#_modal_edit_user"
              class="btn btn-warning"
              @click="showModal(user.id)"
            >
              Edit
            </button>
          </td>
          <td>
            <a
              href="javascript:;"
              class="btn btn-danger"
              @click="deleteUser(user.id, index)"
            >
              Delete
            </a>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- ---------------- modal edit ------------------ -->
    <div
      class="modal fade"
      id="_modal_edit_user"
      tabindex="-1"
      role="dialog"
      aria-labelledby="editModalUser"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalUser">Edit User</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="/users">
            <div class="modal-body">
              <input type="hidden" name="" v-model="user.id" />
              <input
                class="form-control mb-3"
                type="text"
                name="name"
                placeholder="Enter Name"
                required
                v-model="user.name"
              />
              <input
                class="form-control mb-3"
                type="text"
                name="city"
                placeholder="Enter Cty"
                required
                v-model="user.city"
              />
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
              <button
                type="submit"
                class="btn btn-primary"
                data-dismiss="modal"
                @click="updateUser()"
              >
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
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
    deleteUser(id, index) {
      axios
        .delete("/api/users/" + id)
        .then((response) => {
          this.users.splice(index, 1);
        })
        .catch((errors) => {
          console.log(errors);
        });
    },
    showModal(id) {
      axios.get("/api/users/" + id + "/edit").then((response) => {
        var res = response.data;
        this.user.id = res.id;
        this.user.name = res.name;
        this.user.city = res.city;
      });
    },
    updateUser() {
      axios
        .put("/api/users/" + this.user.id, {
          name: this.user.name,
          city: this.user.city,
        })
        .then((response) => {
          this.geteUserData();
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