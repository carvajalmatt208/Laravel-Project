<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_pages_are_available(): void
    {
        $this->get('/tasks')->assertOk()->assertSee('Task Manager');
        $this->get('/tasks/create')->assertOk()->assertSee('Add a task.');

        $task = Task::create(['task_name' => 'Review notes', 'status' => 'Pending']);

        $this->get("/tasks/{$task->id}/edit")->assertOk()->assertSee('Update a task.');
    }

    public function test_tasks_can_be_created_and_viewed(): void
    {
        $response = $this->post('/tasks', [
            'task_name' => 'Finish Laravel project',
            'description' => 'Complete the CRUD workflow.',
            'status' => 'Pending',
            'due_date' => '2026-10-01',
        ]);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', ['task_name' => 'Finish Laravel project']);
        $this->get('/tasks')->assertOk()->assertSee('Finish Laravel project');
    }

    public function test_tasks_can_be_updated_to_completed(): void
    {
        $task = Task::create(['task_name' => 'Review notes', 'status' => 'Pending']);

        $this->put("/tasks/{$task->id}", [
            'task_name' => 'Review notes',
            'description' => 'Reviewed and submitted.',
            'status' => 'Completed',
            'due_date' => null,
        ])->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => 'Completed']);
    }

    public function test_tasks_can_be_deleted(): void
    {
        $task = Task::create(['task_name' => 'Temporary task', 'status' => 'Pending']);

        $this->delete("/tasks/{$task->id}")->assertRedirect('/tasks');

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_status_must_be_pending_or_completed(): void
    {
        $response = $this->post('/tasks', [
            'task_name' => 'Invalid task',
            'status' => 'In progress',
        ]);

        $response->assertSessionHasErrors('status');
    }
}
