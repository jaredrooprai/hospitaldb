<!DOCTYPE html>
<html>
<!--
  Copyright 2015 Google Inc.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Android Theme Color -->
  <meta name="theme-color" content="white">
  <title>hospitaldb</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,900|Roboto+Mono:400,700">
  <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-green.min.css" />
  <link rel="stylesheet" href="styles/index.css" />
  <script src="https://storage.googleapis.com/code.getmdl.io/1.1.3/material.min.js"></script>
</head>

<body>

  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">HospitalDB</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
    </div>
  </header>

  <main class="mdl-layout__content">
      <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--4-col"></div>
          <div class="mdl-cell mdl-cell--4-col">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              Doctor Access
            </button>
          </div>
          <div class="mdl-cell mdl-cell--4-col"></div>

          <div class="mdl-cell mdl-cell--4-col"></div>
          <div class="mdl-cell mdl-cell--4-col">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              Nurse Access
            </button>
          </div>
          <div class="mdl-cell mdl-cell--4-col"></div>

          <div class="mdl-cell mdl-cell--4-col"></div>
          <div class="mdl-cell mdl-cell--4-col">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              Management Access
            </button>
          </div>
          <div class="mdl-cell mdl-cell--4-col"></div>

          <div class="mdl-cell mdl-cell--4-col"></div>
          <div class="mdl-cell mdl-cell--4-col">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              Secretary Access
            </button>
          </div>
          <div class="mdl-cell mdl-cell--4-col"></div>

      </div>
  </main>

</body>

</html>
