<template>
  <div class="notification-top-bar">
    <p>
      Oracular IS Completes Acquisition of Logixify Inc. See the
      <small
        ><a
          href="https://www.oracular.com/index.php?option=com_content&view=article&id=79"
          >Press Release</a
        ></small
      >
    </p>
  </div>
</template>

<script>
export default {
  name:'navbar-notification',
};
</script>

<style>
.notification-top-bar {
  position: fixed;
  top: 0;
  left: 0;
  height: 40px;
  line-height: 40px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
  color: #ffffff;
  font-family: sans-serif;
  font-weight: lighter;
  font-size: 14px;
}
.notification-top-bar p {
  padding: 0;
  margin: 0;
}
.notification-top-bar p a {
  padding: 5px 10px;
  border-radius: 3px;
  background: #fff;
  color: #1abc9c;
  font-weight: bold;
  text-decoration: none;
}
</style>
