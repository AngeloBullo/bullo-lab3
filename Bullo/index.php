<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Accessible To-Do List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- <a href="#main-content" class="skip-link">Skip to Main Content</a> -->

  <div class="container" id="main-content">
    <h1>Accessible To-Do List</h1>
    <nav style="text-align: center;">
      <a href="#" onclick="showSection('home')">Home</a>
      <a href="#" onclick="showSection('instructions')">Instructions</a>
      <a href="#" onclick="showSection('tasks')">My Tasks</a>
    </nav>

    <hr />

    <div id="home">
      <h2>Welcome</h2>
      <p>This is your accessible to-do list. Use the menu above to navigate between sections.</p>
    </div>

    <div id="instructions" class="hidden">
      <h2>Instructions</h2>
      <p>To add a task, type in the input box and press <strong>Add Task</strong> or hit <strong>Enter</strong>. You can mark tasks complete by checking the box next to them.</p>
    </div>

    <div id="tasks" class="hidden">
      <h2>My Tasks</h2>
      <div class="task-input">
        <input type="text" id="new-task" name="new-task" placeholder="Enter a new task..." />
        <button class="add-btn" id="add-task">Add Task</button>
      </div>

      <ul class="task-list" id="task-list">
        <li><input type="checkbox" /> hello</li>
        <li><input type="checkbox" /> qwerty</li>
      </ul>

      <div id="status-message" aria-live="polite">Task "qwerty" added.</div>
    </div>
  </div>

  <script>
    function showSection(sectionId) {
      ['home', 'instructions', 'tasks'].forEach(id => {
        document.getElementById(id).classList.add('hidden');
      });
      document.getElementById(sectionId).classList.remove('hidden');
    }

    document.getElementById('add-task').addEventListener('click', function () {
      const taskInput = document.getElementById('new-task');
      const taskText = taskInput.value.trim();

      if (taskText) {
        const taskList = document.getElementById('task-list');
        const newItem = document.createElement('li');
        newItem.innerHTML = `<input type="checkbox"> ${taskText}`;
        taskList.appendChild(newItem);

        const statusMessage = document.getElementById('status-message');
        statusMessage.textContent = `Task "${taskText}" added.`;

        taskInput.value = '';
      }
    });

    document.getElementById('new-task').addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        document.getElementById('add-task').click();
      }
    });


    showSection('home');
  </script>
</body>
</html>