<a href="../../controllers/DocenteController.php?delete=<?= $d['id'] ?>" 
   class="btn btn-sm btn-danger" 
   onclick="return confirm('¿Eliminar al docente <?= htmlspecialchars($d['nombre']) ?>?')">
   Eliminar
</a>
