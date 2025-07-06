@extends('admin.layouts.app')

{{-- @section('styles')
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.3/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
      body {
        background-color: #f8f9fa;
      }
  
      .kanban-column {
        min-height: 600px;
        border-radius: 8px;
        padding: 1rem;
        position: relative;
      }
  
      .todo-column {
        background-color: #e9ecef;
      }
  
      .progress-column {
        background-color: #e3f2fd;
      }
  
      .done-column {
        background-color: #e8f5e8;
      }
  
      .task-card {
        border: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        margin-bottom: 0.75rem;
        cursor: grab;
        transition: all 0.2s;
        user-select: none;
      }
  
      .task-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        transform: translateY(-1px);
      }
  
      .task-card.dragging {
        opacity: 0.5;
        transform: rotate(2deg) scale(1.02);
        cursor: grabbing;
        z-index: 1000;
      }
  
      .kanban-column.drag-over {
        background-color: rgba(13, 110, 253, 0.1);
        border: 2px dashed #0d6efd;
        transition: all 0.2s;
      }
  
      .priority-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
      }
  
      .priority-1 {
        background-color: #dc3545;
      }
  
      .priority-2 {
        background-color: #ffc107;
      }
  
      .priority-3 {
        background-color: #fd7e14;
      }
  
      .priority-4 {
        background-color: #198754;
      }
  
      .task-type-icon {
        width: 16px;
        height: 16px;
        border-radius: 2px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
  
      .story-icon {
        background-color: #198754;
      }
  
      .bug-icon {
        background-color: #dc3545;
      }
  
      .task-icon {
        background-color: #0d6efd;
      }
  
      .avatar-group {
        display: flex;
        margin-left: -8px;
      }
  
      .avatar-group .avatar {
        margin-left: -8px;
        border: 2px solid white;
      }
  
      .avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 12px;
        font-weight: 500;
      }
  
      .task-avatar {
        width: 24px;
        height: 24px;
        font-size: 10px;
      }
  
      .unassigned-avatar {
        background-color: #dee2e6;
        color: #6c757d;
        border: 2px dashed #adb5bd;
      }
  
      .column-header {
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
      }
  
      .task-id {
        font-size: 0.75rem;
        color: #6c757d;
        font-weight: 500;
      }
  
      .task-title {
        font-size: 0.875rem;
        color: #212529;
        line-height: 1.4;
      }
  
      .priority-number {
        font-size: 0.75rem;
        color: #6c757d;
      }
  
      .add-task-btn {
        width: 100%;
        border: 2px dashed #6c757d;
        background: transparent;
        color: #6c757d;
        padding: 0.75rem;
        border-radius: 8px;
        transition: all 0.2s;
      }
  
      .add-task-btn:hover {
        border-color: #0d6efd;
        color: #0d6efd;
        background-color: rgba(13, 110, 253, 0.1);
      }
  
      .task-form {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
  
      .task-counter {
        transition: all 0.3s;
      }
  
      .drop-zone {
        min-height: 100px;
        border-radius: 8px;
        transition: all 0.3s;
      }
  
      .priority-number {
        font-size: 0.75rem;
        color: #6c757d;
      }
  
      .add-task-btn {
        width: 100%;
        border: 2px dashed #6c757d;
        background: transparent;
        color: #6c757d;
        padding: 0.75rem;
        border-radius: 8px;
        transition: all 0.2s;
      }
  
      .add-task-btn:hover {
        border-color: #0d6efd;
        color: #0d6efd;
        background-color: rgba(13, 110, 253, 0.1);
      }
  
      .task-form {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
  
      .task-counter {
        transition: all 0.3s;
      }
  
      .drop-zone {
        min-height: 100px;
        border-radius: 8px;
        transition: all 0.3s;
      }
  
      .empty-column {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 200px;
        color: #6c757d;
        font-style: italic;
      }
  
      /* Agregar al final del bloque <style> existente */
  
      .task-card:focus {
        outline: 2px solid #0d6efd;
        outline-offset: 2px;
      }
  
      .drop-indicator {
        height: 3px;
        background-color: #0d6efd;
        margin: 5px 0;
        border-radius: 2px;
        opacity: 0.8;
        transition: all 0.2s;
        box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
      }
  
      .task-card {
        transition: all 0.2s ease;
      }
  
      .task-card.dragging {
        opacity: 0.5;
        transform: rotate(2deg) scale(1.02);
        cursor: grabbing;
        z-index: 1000;
      }
  
      .kanban-column.drag-over {
        background-color: rgba(13, 110, 253, 0.1);
        border: 2px dashed #0d6efd;
        transition: all 0.2s;
      }
  
      .drop-indicator {
        height: 3px;
        background-color: #0d6efd;
        margin: 5px 0;
        border-radius: 2px;
        opacity: 0.8;
        transition: all 0.2s;
        box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
      }
  
      .user-option {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
      }
  
      .user-option:hover {
        background-color: #f8f9fa;
      }
  
      .user-avatar-small {
        width: 20px;
        height: 20px;
        font-size: 9px;
      }
  
      .assignee-preview {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
        padding: 8px;
        background-color: #f8f9fa;
        border-radius: 6px;
        font-size: 0.875rem;
      }
  
      .assignee-preview.unassigned {
        color: #6c757d;
        font-style: italic;
      }
    </style>
@endsection --}}

@section('toolbar')
  <!--begin::Toolbar-->
  <div class="toolbar" id="kt_toolbar">
      <!--begin::Container-->
      <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
          <!--begin::Page title-->
          <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
              data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
              class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
              <!--begin::Title-->
              <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Tablero</h1>
          </div>
      </div>
      <!--end::Container-->
  </div>
  <!--end::Toolbar-->
@endsection

@section('content')
<style>
  body {
    background-color: #f8f9fa;
  }

  .kanban-column {
    min-height: 600px;
    border-radius: 8px;
    padding: 1rem;
    position: relative;
  }

  .todo-column {
    background-color: #e9ecef;
  }

  .progress-column {
    background-color: #e3f2fd;
  }

  .done-column {
    background-color: #e8f5e8;
  }

  .task-card {
    border: none;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    margin-bottom: 0.75rem;
    cursor: grab;
    transition: all 0.2s;
    user-select: none;
  }

  .task-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    transform: translateY(-1px);
  }

  .task-card.dragging {
    opacity: 0.5;
    transform: rotate(2deg) scale(1.02);
    cursor: grabbing;
    z-index: 1000;
  }

  .kanban-column.drag-over {
    background-color: rgba(13, 110, 253, 0.1);
    border: 2px dashed #0d6efd;
    transition: all 0.2s;
  }

  .priority-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
  }

  .priority-1 {
    background-color: #dc3545;
  }

  .priority-2 {
    background-color: #ffc107;
  }

  .priority-3 {
    background-color: #fd7e14;
  }

  .priority-4 {
    background-color: #198754;
  }

  .task-type-icon {
    width: 16px;
    height: 16px;
    border-radius: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .story-icon {
    background-color: #198754;
  }

  .bug-icon {
    background-color: #dc3545;
  }

  .task-icon {
    background-color: #0d6efd;
  }

  .avatar-group {
    display: flex;
    margin-left: -8px;
  }

  .avatar-group .avatar {
    margin-left: -8px;
    border: 2px solid white;
  }

  .avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    font-weight: 500;
  }

  .task-avatar {
    width: 24px;
    height: 24px;
    font-size: 10px;
  }

  .unassigned-avatar {
    background-color: #dee2e6;
    color: #6c757d;
    border: 2px dashed #adb5bd;
  }

  .column-header {
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #6c757d;
  }

  .task-id {
    font-size: 0.75rem;
    color: #6c757d;
    font-weight: 500;
  }

  .task-title {
    font-size: 0.875rem;
    color: #212529;
    line-height: 1.4;
  }

  .priority-number {
    font-size: 0.75rem;
    color: #6c757d;
  }

  .add-task-btn {
    width: 100%;
    border: 2px dashed #6c757d;
    background: transparent;
    color: #6c757d;
    padding: 0.75rem;
    border-radius: 8px;
    transition: all 0.2s;
  }

  .add-task-btn:hover {
    border-color: #0d6efd;
    color: #0d6efd;
    background-color: rgba(13, 110, 253, 0.1);
  }

  .task-form {
    background: white;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .task-counter {
    transition: all 0.3s;
  }

  .drop-zone {
    min-height: 100px;
    border-radius: 8px;
    transition: all 0.3s;
  }

  .priority-number {
    font-size: 0.75rem;
    color: #6c757d;
  }

  .add-task-btn {
    width: 100%;
    border: 2px dashed #6c757d;
    background: transparent;
    color: #6c757d;
    padding: 0.75rem;
    border-radius: 8px;
    transition: all 0.2s;
  }

  .add-task-btn:hover {
    border-color: #0d6efd;
    color: #0d6efd;
    background-color: rgba(13, 110, 253, 0.1);
  }

  .task-form {
    background: white;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .task-counter {
    transition: all 0.3s;
  }

  .drop-zone {
    min-height: 100px;
    border-radius: 8px;
    transition: all 0.3s;
  }

  .empty-column {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 200px;
    color: #6c757d;
    font-style: italic;
  }

  /* Agregar al final del bloque <style> existente */

  .task-card:focus {
    outline: 2px solid #0d6efd;
    outline-offset: 2px;
  }

  .drop-indicator {
    height: 3px;
    background-color: #0d6efd;
    margin: 5px 0;
    border-radius: 2px;
    opacity: 0.8;
    transition: all 0.2s;
    box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
  }

  .task-card {
    transition: all 0.2s ease;
  }

  .task-card.dragging {
    opacity: 0.5;
    transform: rotate(2deg) scale(1.02);
    cursor: grabbing;
    z-index: 1000;
  }

  .kanban-column.drag-over {
    background-color: rgba(13, 110, 253, 0.1);
    border: 2px dashed #0d6efd;
    transition: all 0.2s;
  }

  .drop-indicator {
    height: 3px;
    background-color: #0d6efd;
    margin: 5px 0;
    border-radius: 2px;
    opacity: 0.8;
    transition: all 0.2s;
    box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
  }

  .user-option {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
  }

  .user-option:hover {
    background-color: #f8f9fa;
  }

  .user-avatar-small {
    width: 20px;
    height: 20px;
    font-size: 9px;
  }

  .assignee-preview {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 8px;
    padding: 8px;
    background-color: #f8f9fa;
    border-radius: 6px;
    font-size: 0.875rem;
  }

  .assignee-preview.unassigned {
    color: #6c757d;
    font-style: italic;
  }
</style>

<div class="container-fluid py-4">
  <!-- Header -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0 fw-semibold">Board Interactivo</h1>
        <div class="d-flex align-items-center gap-3">
          <!-- Avatar Group -->
          <div class="avatar-group">
            <div class="avatar">JD</div>
            <div class="avatar">SM</div>
            <div class="avatar">MK</div>
            <div class="avatar">AL</div>
            <div class="avatar bg-secondary">+5</div>
          </div>
          {{-- <button class="btn btn-primary">Complete sprint</button>
          <button class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-three-dots"></i>
          </button> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Kanban Board -->
  <div class="row g-3">
    @foreach ($categories as $item)
      <div class="col-lg-3 col-md-12">
        <div class="kanban-column todo-column drop-zone" data-status="todo">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="column-header">{{ $item->name }}</span>
            <span class="badge bg-secondary task-counter" id="todo-counter">3</span>
          </div>

          <!-- Add Task Button -->
          <button class="add-task-btn mb-3" onclick="showTaskForm('todo')">
            <i class="bi bi-plus-circle me-2"></i>Agregar tarea
          </button>

          <!-- Task Form (Hidden by default) -->
          <div class="task-form d-none" id="todo-form">
            <div class="mb-3">
              <label class="form-label">Título de la tarea</label>
              <input type="text" class="form-control form-control-sm" placeholder="Ingresa el título..."
                id="todo-title">
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label class="form-label">Prioridad</label>
                <select class="form-select form-select-sm" id="todo-priority">
                  <option value="1">🔴 Alta (1)</option>
                  <option value="2">🟡 Media-Alta (2)</option>
                  <option value="3" selected>🟠 Media (3)</option>
                  <option value="4">🟢 Baja (4)</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label">Tipo</label>
                <select class="form-select form-select-sm" id="todo-type">
                  <option value="story">📋 Historia</option>
                  <option value="bug">🐛 Bug</option>
                  <option value="task">✅ Tarea</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Asignar a</label>
              <select class="form-select form-select-sm" id="todo-assignee" onchange="updateAssigneePreview('todo')">
                <option value="">Sin asignar</option>
                <option value="JD">John Doe</option>
                <option value="SM">Sarah Miller</option>
                <option value="MK">Mike Johnson</option>
                <option value="AL">Alex Lee</option>
                <option value="EM">Emma Wilson</option>
                <option value="TM">Tom Brown</option>
                <option value="LS">Lisa Garcia</option>
                <option value="DV">David Chen</option>
                <option value="KT">Kate Rodriguez</option>
                <option value="RY">Ryan Taylor</option>
              </select>
              <div class="assignee-preview unassigned" id="todo-assignee-preview">
                <i class="bi bi-person-dash"></i>
                <span>Sin asignar</span>
              </div>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-primary btn-sm" onclick="createTask('todo')">
                <i class="bi bi-plus-circle me-1"></i>Crear
              </button>
              <button class="btn btn-secondary btn-sm" onclick="hideTaskForm('todo')">
                <i class="bi bi-x-circle me-1"></i>Cancelar
              </button>
            </div>
          </div>

          <!-- Task Cards Container -->
          <div class="tasks-container" id="todo-tasks">
            @foreach ($item->tasks as $task)
              <div class="card task-card" draggable="true" data-task-id="NUC-205" data-assignee="JD">
                <div class="card-body p-3">
                  <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="task-id">NUC-205</span>
                    <div class="d-flex align-items-center gap-1">
                      <span class="priority-dot priority-4"></span>
                      <span class="priority-number">{{ $task->priority }}</span>
                    </div>
                  </div>
                  <p class="task-title mb-3">{{ $task->description }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="task-type-icon story-icon">
                      <i class="bi bi-check-circle-fill text-white" style="font-size: 8px;"></i>
                    </div>
                    <div class="avatar task-avatar">
                      {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($task->user->name ?? '', 0, 2)) }}
                    </div>
                  </div>
                </div>
              </div>
            @endforeach

            {{-- <div class="card task-card" draggable="true" data-task-id="NUC-206" data-assignee="SM">
              <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <span class="task-id">NUC-206</span>
                  <div class="d-flex align-items-center gap-1">
                    <span class="priority-dot priority-3"></span>
                    <span class="priority-number">3</span>
                  </div>
                </div>
                <p class="task-title mb-3">Bump version for new API for billing</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="task-type-icon bug-icon">
                    <div style="width: 6px; height: 6px; background-color: white; border-radius: 50%;"></div>
                  </div>
                  <div class="avatar task-avatar">SM</div>
                </div>
              </div>
            </div>

            <div class="card task-card" draggable="true" data-task-id="NUC-208" data-assignee="">
              <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <span class="task-id">NUC-208</span>
                  <div class="d-flex align-items-center gap-1">
                    <span class="priority-dot priority-1"></span>
                    <span class="priority-number">1</span>
                  </div>
                </div>
                <p class="task-title mb-3">Add NPS feedback to wallboard</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="task-type-icon story-icon">
                    <i class="bi bi-check-circle-fill text-white" style="font-size: 8px;"></i>
                  </div>
                  <div class="avatar task-avatar unassigned-avatar">
                    <i class="bi bi-person-dash" style="font-size: 10px;"></i>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    @endforeach
    <!-- TO DO Column -->
    

    <!-- IN PROGRESS Column -->
    {{-- <div class="col-lg-4 col-md-12">
      <div class="kanban-column progress-column drop-zone" data-status="progress">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <span class="column-header">In Progress</span>
          <span class="badge bg-primary task-counter" id="progress-counter">2</span>
        </div>

        <!-- Add Task Button -->
        <button class="add-task-btn mb-3" onclick="showTaskForm('progress')">
          <i class="bi bi-plus-circle me-2"></i>Agregar tarea
        </button>

        <!-- Task Form (Hidden by default) -->
        <div class="task-form d-none" id="progress-form">
          <div class="mb-3">
            <label class="form-label">Título de la tarea</label>
            <input type="text" class="form-control form-control-sm" placeholder="Ingresa el título..."
              id="progress-title">
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <label class="form-label">Prioridad</label>
              <select class="form-select form-select-sm" id="progress-priority">
                <option value="1">🔴 Alta (1)</option>
                <option value="2">🟡 Media-Alta (2)</option>
                <option value="3" selected>🟠 Media (3)</option>
                <option value="4">🟢 Baja (4)</option>
              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Tipo</label>
              <select class="form-select form-select-sm" id="progress-type">
                <option value="story">📋 Historia</option>
                <option value="bug">🐛 Bug</option>
                <option value="task">✅ Tarea</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Asignar a</label>
            <select class="form-select form-select-sm" id="progress-assignee"
              onchange="updateAssigneePreview('progress')">
              <option value="">Sin asignar</option>
              <option value="JD">John Doe</option>
              <option value="SM">Sarah Miller</option>
              <option value="MK">Mike Johnson</option>
              <option value="AL">Alex Lee</option>
              <option value="EM">Emma Wilson</option>
              <option value="TM">Tom Brown</option>
              <option value="LS">Lisa Garcia</option>
              <option value="DV">David Chen</option>
              <option value="KT">Kate Rodriguez</option>
              <option value="RY">Ryan Taylor</option>
            </select>
            <div class="assignee-preview unassigned" id="progress-assignee-preview">
              <i class="bi bi-person-dash"></i>
              <span>Sin asignar</span>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-primary btn-sm" onclick="createTask('progress')">
              <i class="bi bi-plus-circle me-1"></i>Crear
            </button>
            <button class="btn btn-secondary btn-sm" onclick="hideTaskForm('progress')">
              <i class="bi bi-x-circle me-1"></i>Cancelar
            </button>
          </div>
        </div>

        <!-- Task Cards Container -->
        <div class="tasks-container" id="progress-tasks">
          <div class="card task-card" draggable="true" data-task-id="NUC-219" data-assignee="AL">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="task-id">NUC-219</span>
                <div class="d-flex align-items-center gap-1">
                  <span class="priority-dot priority-1"></span>
                  <span class="priority-number">1</span>
                </div>
              </div>
              <p class="task-title mb-3">Update T&C copy with v1.9 from the writers guild</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="task-type-icon bug-icon">
                  <div style="width: 6px; height: 6px; background-color: white; border-radius: 50%;"></div>
                </div>
                <div class="avatar task-avatar">AL</div>
              </div>
            </div>
          </div>

          <div class="card task-card" draggable="true" data-task-id="NUC-215" data-assignee="EM">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="task-id">NUC-215</span>
                <div class="d-flex align-items-center gap-1">
                  <span class="priority-dot priority-3"></span>
                  <span class="priority-number">3</span>
                </div>
              </div>
              <p class="task-title mb-3">Tech spike on new stripe integration with paypal</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="task-type-icon story-icon">
                  <i class="bi bi-check-circle-fill text-white" style="font-size: 8px;"></i>
                </div>
                <div class="avatar task-avatar">EM</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    {{-- <!-- DONE Column -->
    <div class="col-lg-4 col-md-12">
      <div class="kanban-column done-column drop-zone" data-status="done">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <span class="column-header">Done</span>
          <span class="badge bg-success task-counter" id="done-counter">1</span>
        </div>

        <!-- Add Task Button -->
        <button class="add-task-btn mb-3" onclick="showTaskForm('done')">
          <i class="bi bi-plus-circle me-2"></i>Agregar tarea
        </button>

        <!-- Task Form (Hidden by default) -->
        <div class="task-form d-none" id="done-form">
          <div class="mb-3">
            <label class="form-label">Título de la tarea</label>
            <input type="text" class="form-control form-control-sm" placeholder="Ingresa el título..."
              id="done-title">
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <label class="form-label">Prioridad</label>
              <select class="form-select form-select-sm" id="done-priority">
                <option value="1">🔴 Alta (1)</option>
                <option value="2">🟡 Media-Alta (2)</option>
                <option value="3" selected>🟠 Media (3)</option>
                <option value="4">🟢 Baja (4)</option>
              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Tipo</label>
              <select class="form-select form-select-sm" id="done-type">
                <option value="story">📋 Historia</option>
                <option value="bug">🐛 Bug</option>
                <option value="task">✅ Tarea</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Asignar a</label>
            <select class="form-select form-select-sm" id="done-assignee" onchange="updateAssigneePreview('done')">
              <option value="">Sin asignar</option>
              <option value="JD">John Doe</option>
              <option value="SM">Sarah Miller</option>
              <option value="MK">Mike Johnson</option>
              <option value="AL">Alex Lee</option>
              <option value="EM">Emma Wilson</option>
              <option value="TM">Tom Brown</option>
              <option value="LS">Lisa Garcia</option>
              <option value="DV">David Chen</option>
              <option value="KT">Kate Rodriguez</option>
              <option value="RY">Ryan Taylor</option>
            </select>
            <div class="assignee-preview unassigned" id="done-assignee-preview">
              <i class="bi bi-person-dash"></i>
              <span>Sin asignar</span>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-primary btn-sm" onclick="createTask('done')">
              <i class="bi bi-plus-circle me-1"></i>Crear
            </button>
            <button class="btn btn-secondary btn-sm" onclick="hideTaskForm('done')">
              <i class="bi bi-x-circle me-1"></i>Cancelar
            </button>
          </div>
        </div>

        <!-- Task Cards Container -->
        <div class="tasks-container" id="done-tasks">
          <div class="card task-card" draggable="true" data-task-id="NUC-336" data-assignee="DV">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="task-id">NUC-336</span>
                <div class="d-flex align-items-center gap-1">
                  <span class="priority-dot priority-4"></span>
                  <span class="priority-number">4</span>
                </div>
              </div>
              <p class="task-title mb-3">Quick booking for accommodations - web</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="task-type-icon story-icon">
                  <i class="bi bi-check-circle-fill text-white" style="font-size: 8px;"></i>
                </div>
                <div class="avatar task-avatar">DV</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Variables globales
    let draggedElement = null;
    let taskCounter = 1000;
    let draggedFromColumn = null;

    // Lista de usuarios disponibles
    const users = {
      'JD': { name: 'John Doe', initials: 'JD', color: '#007bff' },
      'SM': { name: 'Sarah Miller', initials: 'SM', color: '#28a745' },
      'MK': { name: 'Mike Johnson', initials: 'MK', color: '#dc3545' },
      'AL': { name: 'Alex Lee', initials: 'AL', color: '#ffc107' },
      'EM': { name: 'Emma Wilson', initials: 'EM', color: '#17a2b8' },
      'TM': { name: 'Tom Brown', initials: 'TM', color: '#6f42c1' },
      'LS': { name: 'Lisa Garcia', initials: 'LS', color: '#fd7e14' },
      'DV': { name: 'David Chen', initials: 'DV', color: '#20c997' },
      'KT': { name: 'Kate Rodriguez', initials: 'KT', color: '#e83e8c' },
      'RY': { name: 'Ryan Taylor', initials: 'RY', color: '#6c757d' }
    };

    // Inicializar drag and drop
    document.addEventListener('DOMContentLoaded', function () {
      initializeDragAndDrop();
      updateAllCounters();
      initializeAssigneePreviews();
    });

    function initializeDragAndDrop() {
      // Agregar event listeners a todas las tareas existentes
      const tasks = document.querySelectorAll('.task-card');
      tasks.forEach(task => {
        addDragListeners(task);
      });

      // Agregar event listeners a las columnas
      const columns = document.querySelectorAll('.drop-zone');
      columns.forEach(column => {
        column.addEventListener('dragover', handleDragOver);
        column.addEventListener('drop', handleDrop);
        column.addEventListener('dragenter', handleDragEnter);
        column.addEventListener('dragleave', handleDragLeave);
      });
    }

    function initializeAssigneePreviews() {
      const statuses = ['todo', 'progress', 'done'];
      statuses.forEach(status => {
        updateAssigneePreview(status);
      });
    }

    function addDragListeners(task) {
      task.addEventListener('dragstart', handleDragStart);
      task.addEventListener('dragend', handleDragEnd);
    }

    function handleDragStart(e) {
      draggedElement = this;
      draggedFromColumn = this.closest('.drop-zone').getAttribute('data-status');
      this.classList.add('dragging');
      e.dataTransfer.effectAllowed = 'move';
      e.dataTransfer.setData('text/html', this.outerHTML);
    }

    function handleDragEnd(e) {
      this.classList.remove('dragging');
      draggedElement = null;
      draggedFromColumn = null;

      // Limpiar todos los indicadores de posición
      document.querySelectorAll('.drop-indicator').forEach(indicator => {
        indicator.remove();
      });

      // Limpiar clases de drag-over
      document.querySelectorAll('.drag-over').forEach(element => {
        element.classList.remove('drag-over');
      });
    }

    function handleDragOver(e) {
      if (e.preventDefault) {
        e.preventDefault();
      }
      e.dataTransfer.dropEffect = 'move';

      // Encontrar la posición exacta donde insertar
      const tasksContainer = this.querySelector('.tasks-container');
      const afterElement = getDragAfterElement(tasksContainer, e.clientY);

      // Limpiar indicadores previos
      document.querySelectorAll('.drop-indicator').forEach(indicator => {
        indicator.remove();
      });

      // Crear indicador de posición
      const indicator = document.createElement('div');
      indicator.className = 'drop-indicator';

      if (afterElement == null) {
        tasksContainer.appendChild(indicator);
      } else {
        tasksContainer.insertBefore(indicator, afterElement);
      }

      return false;
    }

    function handleDragEnter(e) {
      this.classList.add('drag-over');
    }

    function handleDragLeave(e) {
      // Solo remover drag-over si realmente salimos de la columna
      if (!this.contains(e.relatedTarget)) {
        this.classList.remove('drag-over');
      }
    }

    function handleDrop(e) {
      if (e.stopPropagation) {
        e.stopPropagation();
      }

      this.classList.remove('drag-over');

      // Limpiar indicadores
      document.querySelectorAll('.drop-indicator').forEach(indicator => {
        indicator.remove();
      });

      if (draggedElement !== null) {
        const tasksContainer = this.querySelector('.tasks-container');
        const afterElement = getDragAfterElement(tasksContainer, e.clientY);
        const currentStatus = this.getAttribute('data-status');

        // Insertar en la posición correcta
        if (afterElement == null) {
          tasksContainer.appendChild(draggedElement);
        } else {
          tasksContainer.insertBefore(draggedElement, afterElement);
        }

        // Actualizar contadores
        updateAllCounters();

        // Log para debugging
        const taskId = draggedElement.getAttribute('data-task-id');
        const assignee = draggedElement.getAttribute('data-assignee');
        const newPosition = Array.from(tasksContainer.children).indexOf(draggedElement) + 1;

        if (draggedFromColumn === currentStatus) {
          console.log(`Tarea ${taskId} (asignada a: ${assignee || 'Sin asignar'}) reordenada en ${currentStatus} a la posición ${newPosition}`);
        } else {
          console.log(`Tarea ${taskId} (asignada a: ${assignee || 'Sin asignar'}) movida de ${draggedFromColumn} a ${currentStatus} en posición ${newPosition}`);
        }
      }

      return false;
    }

    // Función para determinar después de qué elemento insertar
    function getDragAfterElement(container, y) {
      const draggableElements = [...container.querySelectorAll('.task-card:not(.dragging)')];

      return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;

        if (offset < 0 && offset > closest.offset) {
          return { offset: offset, element: child };
        } else {
          return closest;
        }
      }, { offset: Number.NEGATIVE_INFINITY }).element;
    }

    // Funciones para manejar asignación de usuarios
    function updateAssigneePreview(status) {
      const select = document.getElementById(`${status}-assignee`);
      const preview = document.getElementById(`${status}-assignee-preview`);
      const selectedValue = select.value;

      if (selectedValue === '') {
        preview.className = 'assignee-preview unassigned';
        preview.innerHTML = `
                <i class="bi bi-person-dash"></i>
                <span>Sin asignar</span>
            `;
      } else {
        const user = users[selectedValue];
        preview.className = 'assignee-preview';
        preview.innerHTML = `
                <div class="avatar user-avatar-small" style="background-color: ${user.color}">
                    ${user.initials}
                </div>
                <span>${user.name}</span>
            `;
      }
    }

    // Funciones para crear tareas
    function showTaskForm(status) {
      const form = document.getElementById(`${status}-form`);
      form.classList.remove('d-none');
    }

    function hideTaskForm(status) {
      const form = document.getElementById(`${status}-form`);
      form.classList.add('d-none');
      // Limpiar formulario
      document.getElementById(`${status}-title`).value = '';
      document.getElementById(`${status}-priority`).value = '3';
      document.getElementById(`${status}-type`).value = 'story';
      document.getElementById(`${status}-assignee`).value = '';
      updateAssigneePreview(status);
    }

    function createTask(status) {
      const title = document.getElementById(`${status}-title`).value.trim();
      const priority = document.getElementById(`${status}-priority`).value;
      const type = document.getElementById(`${status}-type`).value;
      const assignee = document.getElementById(`${status}-assignee`).value;

      if (!title) {
        alert('Por favor ingresa un título para la tarea');
        return;
      }

      // Generar ID único
      taskCounter++;
      const taskId = `NUC-${taskCounter}`;

      // Crear HTML de la tarea
      const taskHTML = createTaskHTML(taskId, title, priority, type, assignee);

      // Agregar a la columna correspondiente
      const tasksContainer = document.getElementById(`${status}-tasks`);
      const taskElement = document.createElement('div');
      taskElement.innerHTML = taskHTML;
      const newTask = taskElement.firstElementChild;

      // Agregar event listeners de drag and drop
      addDragListeners(newTask);

      // Insertar al principio de la lista (nueva tarea arriba)
      if (tasksContainer.firstChild) {
        tasksContainer.insertBefore(newTask, tasksContainer.firstChild);
      } else {
        tasksContainer.appendChild(newTask);
      }

      // Ocultar formulario y actualizar contadores
      hideTaskForm(status);
      updateAllCounters();

      // Animación de entrada
      newTask.style.opacity = '0';
      newTask.style.transform = 'translateY(-20px)';
      setTimeout(() => {
        newTask.style.transition = 'all 0.3s ease';
        newTask.style.opacity = '1';
        newTask.style.transform = 'translateY(0)';
      }, 10);

      const assigneeName = assignee ? users[assignee].name : 'Sin asignar';
      console.log(`Nueva tarea creada: ${taskId} en ${status}, asignada a: ${assigneeName}`);
    }

    function createTaskHTML(taskId, title, priority, type, assignee) {
      const priorityClass = `priority-${priority}`;
      const typeIcon = getTypeIconHTML(type);

      let avatarHTML;
      if (assignee && users[assignee]) {
        const user = users[assignee];
        avatarHTML = `<div class="avatar task-avatar" style="background-color: ${user.color}">${user.initials}</div>`;
      } else {
        avatarHTML = `<div class="avatar task-avatar unassigned-avatar">
                            <i class="bi bi-person-dash" style="font-size: 10px;"></i>
                         </div>`;
      }

      return `
            <div class="card task-card" draggable="true" data-task-id="${taskId}" data-assignee="${assignee}">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="task-id">${taskId}</span>
                        <div class="d-flex align-items-center gap-1">
                            <span class="priority-dot ${priorityClass}"></span>
                            <span class="priority-number">${priority}</span>
                        </div>
                    </div>
                    <p class="task-title mb-3">${title}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        ${typeIcon}
                        ${avatarHTML}
                    </div>
                </div>
            </div>
        `;
    }

    function getTypeIconHTML(type) {
      switch (type) {
        case 'bug':
          return `<div class="task-type-icon bug-icon">
                            <div style="width: 6px; height: 6px; background-color: white; border-radius: 50%;"></div>
                        </div>`;
        case 'task':
          return `<div class="task-type-icon task-icon">
                            <i class="bi bi-list-task text-white" style="font-size: 8px;"></i>
                        </div>`;
        default: // story
          return `<div class="task-type-icon story-icon">
                            <i class="bi bi-check-circle-fill text-white" style="font-size: 8px;"></i>
                        </div>`;
      }
    }

    function updateAllCounters() {
      const statuses = ['todo', 'progress', 'done'];
      statuses.forEach(status => {
        const container = document.getElementById(`${status}-tasks`);
        const count = container.querySelectorAll('.task-card').length;
        const counter = document.getElementById(`${status}-counter`);
        counter.textContent = count;
      });
    }

    // Función para eliminar tarea (doble click)
    document.addEventListener('dblclick', function (e) {
      if (e.target.closest('.task-card')) {
        if (confirm('¿Estás seguro de que quieres eliminar esta tarea?')) {
          const task = e.target.closest('.task-card');
          const taskId = task.getAttribute('data-task-id');
          const assignee = task.getAttribute('data-assignee');

          // Animación de salida
          task.style.transition = 'all 0.3s ease';
          task.style.opacity = '0';
          task.style.transform = 'translateX(100px)';

          setTimeout(() => {
            task.remove();
            updateAllCounters();
          }, 300);

          const assigneeName = assignee && users[assignee] ? users[assignee].name : 'Sin asignar';
          console.log(`Tarea ${taskId} (asignada a: ${assigneeName}) eliminada`);
        }
      }
    });

    // Funciones adicionales para reordenamiento manual
    function moveTaskUp(taskElement) {
      const previousSibling = taskElement.previousElementSibling;
      if (previousSibling) {
        taskElement.parentNode.insertBefore(taskElement, previousSibling);
        logTaskPosition(taskElement, 'moved up');
      }
    }

    function moveTaskDown(taskElement) {
      const nextSibling = taskElement.nextElementSibling;
      if (nextSibling) {
        taskElement.parentNode.insertBefore(nextSibling, taskElement);
        logTaskPosition(taskElement, 'moved down');
      }
    }

    function logTaskPosition(taskElement, action) {
      const taskId = taskElement.getAttribute('data-task-id');
      const assignee = taskElement.getAttribute('data-assignee');
      const container = taskElement.closest('.tasks-container');
      const position = Array.from(container.children).indexOf(taskElement) + 1;
      const status = taskElement.closest('.drop-zone').getAttribute('data-status');
      const assigneeName = assignee && users[assignee] ? users[assignee].name : 'Sin asignar';

      console.log(`Tarea ${taskId} (asignada a: ${assigneeName}) ${action} en ${status} a la posición ${position}`);
    }

    // Event listener para teclas de flecha (opcional - para reordenar con teclado)
    document.addEventListener('keydown', function (e) {
      const focusedTask = document.activeElement.closest('.task-card');
      if (focusedTask) {
        if (e.key === 'ArrowUp' && e.ctrlKey) {
          e.preventDefault();
          moveTaskUp(focusedTask);
        } else if (e.key === 'ArrowDown' && e.ctrlKey) {
          e.preventDefault();
          moveTaskDown(focusedTask);
        }
      }
    });

    // Hacer las tareas enfocables para el teclado
    document.addEventListener('click', function (e) {
      const task = e.target.closest('.task-card');
      if (task) {
        task.tabIndex = 0;
        task.focus();
      }
    });
  </script>
@endpush