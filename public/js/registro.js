
let currentUserType = 'empleado';
let skills = [];

function selectUserType(type, button) {
    currentUserType = type;
    document.getElementById('tipoUsuario').value = type;

    // Cambiar estilo de botones
    document.querySelectorAll('.type-btn').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    const empleadoSection = document.getElementById('empleadoSection');
    const empleadorSection = document.getElementById('empleadorSection');

    if (type === 'empleado') {
        empleadoSection.style.display = 'block';
        empleadorSection.style.display = 'none';
        empleadoSection.querySelectorAll('input, textarea, select').forEach(el => el.disabled = false);
        empleadorSection.querySelectorAll('input, textarea, select').forEach(el => el.disabled = true);
    } else {
        empleadorSection.style.display = 'block';
        empleadoSection.style.display = 'none';
        empleadorSection.querySelectorAll('input, textarea, select').forEach(el => el.disabled = false);
        empleadoSection.querySelectorAll('input, textarea, select').forEach(el => el.disabled = true);
    }
}

function updateFileName(input) {
    const name = input.files[0]?.name || "No se ha seleccionado ningún archivo";
    document.getElementById('fileName').textContent = name;
}

function addSkill() {
    const input = document.getElementById('habilidadInput');
    const skill = input.value.trim();
    if (skill && !skills.includes(skill)) {
        skills.push(skill);
        updateSkillsList();
        input.value = '';
    }
}

function removeSkill(skill) {
    skills = skills.filter(s => s !== skill);
    updateSkillsList();
}

function updateSkillsList() {
    const container = document.getElementById('skillsList');
    container.innerHTML = skills.map(skill =>
        `<div class="skill-tag">${skill}<button type="button" onclick="removeSkill('${skill}')">×</button></div>`
    ).join('');
    document.getElementById('habilidadesHidden').value = JSON.stringify(skills);
}

document.addEventListener('DOMContentLoaded', () => {
    const habilidadInput = document.getElementById('habilidadInput');
    if (habilidadInput) {
        habilidadInput.addEventListener('keypress', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                addSkill();
            }
        });
    }
});
