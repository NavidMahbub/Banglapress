<template>
  <div>
    <b-dropdown text="Day" variant="outline-primary" class="m-2">
      <div id="scroll-date">
        <b-dropdown-item href="#">01</b-dropdown-item>
        <b-dropdown-item href="#">02 </b-dropdown-item>
      </div>
    </b-dropdown>

    <b-dropdown
      text="Month"
      variant="outline-success"
      class="m-2"
      overflow="scroll"
    >
      <div id="scroll-date">
        <b-dropdown-item href="#">Action</b-dropdown-item>
        <b-dropdown-item href="#">Another </b-dropdown-item>
      </div>
    </b-dropdown>

    <b-dropdown text="Year" variant="outline-info" class="m-2">
      <div id="scroll-date">
        <b-dropdown-item href="#">Action</b-dropdown-item>
        <b-dropdown-item href="#">Another </b-dropdown-item>
      </div>
    </b-dropdown>
  </div>
</template>

<style scoped>
#scroll-date {
  position: relative;
  height: 100px;
  overflow-y: scroll;
  /* border: 1px solid blue; */
}
</style>
